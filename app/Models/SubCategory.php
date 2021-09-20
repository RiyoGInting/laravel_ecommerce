<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name_en',
        'name_id',
        'slug_en',
        'slug_id'
    ];

    // relationships
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
