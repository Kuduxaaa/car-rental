<?php

namespace Database\Seeders;

use App\Models\Filters;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FiltersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'Drive Type',
                'value' => '4x4'
            ],
            [
                'name' => 'Drive Type',
                'value' => '2x4'
            ],
            [
                'name' => 'Body Type',
                'value' => 'SUV'
            ],
            [
                'name' => 'Body Type',
                'value' => 'Sedan'
            ],
            [
                'name' => 'Fuel Type',
                'value' => 'Petrol'
            ],
            [
                'name' => 'Fuel Type',
                'value' => 'Diesel'
            ],
            [
                'name' => 'Fuel Type',
                'value' => 'Hybrid'
            ],
            [
                'name' => 'Transmission Type',
                'value' => 'Automatic'
            ],
            [
                'name' => 'Transmission Type',
                'value' => 'Manual'
            ],
            [
                'name' => 'Interior Type',
                'value' => 'Leather'
            ],
            [
                'name' => 'Interior Type',
                'value' => 'Fabric'
            ],
        ];

        foreach ($data as $filter) 
        {
            Filters::create($filter);
        }
    }
}
