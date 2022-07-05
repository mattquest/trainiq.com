<?php

namespace Database\Seeders;

use App\Models\Movement;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MovementSeeder extends Seeder
{
    private static $movements = [
        ['name' => 'Power Snatch'],
        ['name' => 'Snatch'],
        ['name' => 'Clean'],
        ['name' => 'Power Clean'],
        ['name' => 'Clean & Jerk'],
        ['name' => 'Power Clean & Jerk'],
        ['name' => 'Back Squat'],
        ['name' => 'Front Squat'],
    ];

    public function run(): void
    {
        array_map(fn($movement) => 
            Movement::updateOrCreate(['name' => $movement['name']]), 
            self::$movements
        );
    }
}
