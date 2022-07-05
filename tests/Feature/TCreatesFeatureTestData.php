<?php

namespace Tests\Feature;

use App\Models\Movement;
use App\Models\User;

trait TCreatesFeatureTestData
{

    protected static User $athlete_one;
    protected static User $athlete_two;
    protected static User $athlete_three;
    protected static User $coach_one;
    protected static User $coach_two;
    protected static Movement $movement_one;
    protected static Movement $movement_two;

    public static function createFeatureTestData(): void {
        self::$athlete_one = User::factory()->create();
        self::$athlete_two = User::factory()->create();
        self::$athlete_three = User::factory()->create();
        self::$coach_one = User::factory()->create();
        self::$coach_two = User::factory()->create();
        self::$movement_one = Movement::factory()->create(['name' => 'movement one']);
        self::$movement_two = Movement::factory()->create(['name' => 'movement two']);
    }

}
