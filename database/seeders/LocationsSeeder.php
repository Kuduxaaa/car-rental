<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LocationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'Tbilisi',
                'price' => 0,
                'type' => 'pickup'
            ],
            [
                'name' => 'Tbilisi international airport',
                'price' => 0,
                'type' => 'pickup'
            ],
            [
                'name' => 'Batumi',
                'price' => 100,
                'type' => 'pickup'
            ],
            [
                'name' => 'Kobuleti',
                'price' => 100,
                'type' => 'pickup'
            ],
            [
                'name' => 'Kutaisi',
                'price' => 110,
                'type' => 'pickup'
            ],
            [
                'name' => 'Poti',
                'price' => 120,
                'type' => 'pickup'
            ],
            [
                'name' => 'Borjomi',
                'price' => 50,
                'type' => 'pickup'
            ],
            [
                'name' => 'Bakuriani',
                'price' => 50,
                'type' => 'pickup'
            ],
            
            [
                'name' => 'Khazbegi',
                'price' => 80,
                'type' => 'pickup'
            ],
            [
                'name' => 'Gudauri',
                'price' => 100,
                'type' => 'pickup'
            ],
            
            [
                'name' => 'Tbilisi',
                'price' => 0,
                'type' => 'dropoff'
            ],
            [
                'name' => 'Tbilisi international airport',
                'price' => 0,
                'type' => 'dropoff'
            ],
            [
                'name' => 'Batumi',
                'price' => 0,
                'type' => 'dropoff'
            ],
            [
                'name' => 'Kobuleti',
                'price' => 0,
                'type' => 'dropoff'
            ],
            [
                'name' => 'Kutaisi',
                'price' => 0,
                'type' => 'dropoff'
            ],
            [
                'name' => 'Poti',
                'price' => 0,
                'type' => 'dropoff'
            ],
            [
                'name' => 'Borjomi',
                'price' => 0,
                'type' => 'dropoff'
            ],
            [
                'name' => 'Bakuriani',
                'price' => 0,
                'type' => 'dropoff'
            ],
            
            [
                'name' => 'Khazbegi',
                'price' => 0,
                'type' => 'dropoff'
            ],
            [
                'name' => 'Gudauri',
                'price' => 0,
                'type' => 'dropoff'
            ],
        ];

        foreach ($data as $value) 
        {
            location::create($value);
        }
    }
}
