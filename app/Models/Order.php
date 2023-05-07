<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'birth_date',
        'phone_number',
        'communicate_with',
        'car_id',
        'pickup_date',
        'pickup_time',
        'dropoff_date',
        'dropoff_time',
        'total_price'
    ];

    public function car()
    {
        return $this->belongsTo(Car::class);
    }

    public function getTotalPriceAttribute()
    {
        $pickupDateTime = Carbon::parse($this->pickup_date . ' ' . $this->pickup_time);
        $dropoffDateTime = Carbon::parse($this->dropoff_date . ' ' . $this->dropoff_time);

        $rentalDays = $pickupDateTime->diffInDays($dropoffDateTime);

        return $this->car->price * $rentalDays;
    }
}
