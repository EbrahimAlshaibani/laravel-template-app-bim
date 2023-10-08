<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'display_name',
    ];
    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
    public function images(): HasManyThrough
    {
        return $this->hasManyThrough(Image::class,Product::class);
    }












    // public function images(): HasManyThrough
    // {
    //     return $this->hasManyThrough(Image::class, Product::class);
    // }
}
