<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'sub_name',
        'title',
        'detail',
        'category_id',
    ];
    public function images(): HasMany
    {
        return $this->hasMany(Image::class);
    }
    public function category() : BelongsTo {
        return $this->belongsTo(Category::class);
    }
}
