<?php

namespace App\Traits;

trait HasMediaRequest
{
    public function addMediaFromRequestIfExist($request, $file, $collection = null): void
    {
        if ($request->hasFile($file)) {
            $this->addMediaFromRequest($file)->toMediaCollection($collection);
        }
    }

    public function deleteMediaCollectionFromRequestIfExist($request, $key, $collection = null): void
    {
        if ($request->boolean($key)) {
            $this->clearMediaCollection($collection);
        }
    }

    public function StoreMultipleMediaFromRequest($request, $file, $collection)
    {
        if ($request->hasFile($file)) {
            $this->addMultipleMediaFromRequest([$file])
                ->each(fn ($fileAdder) =>
                $fileAdder->toMediaCollection($collection));
        }
    }
}
