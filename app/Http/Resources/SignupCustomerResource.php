<?php

namespace App\Http\Resources\Customer;

use Illuminate\Http\Resources\Json\JsonResource;

class SignupCustomerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'birth_date' => $this->birth_date,
            'phone' => $this->verifyPhone?->phone,
            'gender' => $this->gender,
            'avatar' => $this->avatar,
            'accept_terms' => $this->accept_terms,
        ];
    }
}
