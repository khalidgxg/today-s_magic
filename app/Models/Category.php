<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $fillable = ['name', 'description', 'active','priority'];

    public function letters()
    {
        return $this->hasMany(Letter::class);
    }
}
