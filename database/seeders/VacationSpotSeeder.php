<?php

namespace Database\Seeders;

use App\Models\VacationSpot;
use Illuminate\Database\Seeder;

class VacationSpotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        VacationSpot::create([
            'title' => 'Sunny Beach',
            'latitude' => 42.6951,
            'longitude' => 27.7100,
        ]);

        VacationSpot::create([
            'title' => 'Mountain Resort',
            'latitude' => 46.2530,
            'longitude' => 10.1420,
        ]);

        VacationSpot::create([
            'title' => 'Tropical Island',
            'latitude' => -18.2871,
            'longitude' => 147.6992,
        ]);

        VacationSpot::create([
            'title' => 'Desert Oasis',
            'latitude' => 25.2760,
            'longitude' => 55.2962,
        ]);

        VacationSpot::create([
            'title' => 'Lakeside Cabin',
            'latitude' => 44.5245,
            'longitude' => -110.5885,
        ]);
    }
}
