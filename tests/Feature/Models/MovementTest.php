<?php

namespace Tests\Feature\Models;

use App\Models\User;
use Tests\Feature\FeatureTestBase;

class MovementTest extends FeatureTestBase
{

    private function movementCountForUser(User $user): int {
        $movements = $this->actingAs($user)
            ->get('/movements/list');
        return count($movements->getData());
    }

    public function test_a_user_creates_their_own_movements()
    {
        $movement_count = $this->movementCountForUser(self::$athlete_one);
        $response = $this->actingAs(self::$athlete_one)
            ->post('/movements', ['name' => 'Turtle Squat']);
        $response->assertStatus(200);
        $movements = $this->actingAs(self::$athlete_one)
            ->get('/movements/list');
        $this->assertEquals(
            $movement_count + 1, 
            count($movements->getData())
        );
        $this->assertEquals(
            $movement_count, 
            self::movementCountForUser(self::$athlete_two)
        );
    }

    public function test_a_user_can_view_movements()
    {
        $response = $this->actingAs(self::$athlete_one)
            ->get('/movements');
        $response->assertSuccessful();
        $response->assertSee(self::$movement_one->name);
        $response->assertSee(self::$movement_two->name);
    }

}
