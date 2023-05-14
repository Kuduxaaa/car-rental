<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'images',
        'description',
        'price',
        'category_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getCategory()
    {
        return $this->category;
    }

    public function getImagesAttribute($value)
    {
        return json_decode($value, true);
    }

    public function filters()
    {
        return $this->hasMany(CarFilters::class);
    }
}
