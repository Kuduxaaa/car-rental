<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filters extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'value',
    ];

    public function car()
    {
        return $this->belongsTo(Car::class);
    }

    public function scopeByDriveType($query, $driveType)
    {
        return $query->where('drive_type', $driveType);
    }

    public function getCarsByFilters($filters)
    {
        $query = Car::query();
        
        foreach ($filters as $filter) {
            $query->whereHas('filters', function ($query) use ($filter) {
                $query->where('name', $filter['name'])
                    ->where('value', $filter['value']);
            });
        }
        
        return $query->get();
    }
}
