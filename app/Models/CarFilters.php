<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarFilters extends Model
{
    use HasFactory;

    protected $table = 'car_filter';

    protected $fillable = ['car_id', 'filter_id'];
    

    public function car()
    {
        return $this->belongsTo(Car::class);
    }

    public function filters()
    {
        return $this->belongsTo(Filters::class);
    }
}
