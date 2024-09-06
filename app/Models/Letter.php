<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Letter extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = ['message_en', 'message_ar','category_id','name_en','name_ar'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }


}
