<?php

namespace Tests\Feature;

use App\Enums\MovementEffort;

class UsersCanLogSessionsTest extends FeatureTestBase
{

    public function test_a_user_can_log_5_by_5_set_group(): void {
        $this->assertEquals(self::$athlete_one->sessions->count(), 0);
        $response = $this->actingAs(self::$athlete_one)
            ->post('/set-groups/', ['sets' => [
                ['movement_id' => self::$movement_one->id, 'reps' => 5],
                ['movement_id' => self::$movement_one->id, 'reps' => 5],
                ['movement_id' => self::$movement_one->id, 'reps' => 5],
                ['movement_id' => self::$movement_one->id, 'reps' => 5],
                ['movement_id' => self::$movement_one->id, 'reps' => 5],
            ]]);
        $response->assertSuccessful();
        self::$athlete_one->refresh();
        $sessions = self::$athlete_one->sessions;
        $this->assertEquals($sessions->count(), 1);
        $set_groups = $sessions->first()->setGroups;
        $this->assertEquals($set_groups->count(), 1);
        $set_group = $set_groups->first();
        $this->assertEquals($set_group->sets->count(), 5);
        $set = $set_group->sets->first();
        $this->assertEquals($set->movement->id, self::$movement_one->id);
    }

    public function test_logging_two_set_groups_in_one_day_creates_one_session(): void {
        $this->assertEquals(self::$athlete_one->sessions->count(), 0);
        $response = $this->actingAs(self::$athlete_one)
            ->post('/set-groups/', ['sets' => [
                ['movement_id' => self::$movement_one->id, 'reps' => 5],
            ]]);
        self::$athlete_one->refresh();
        $sessions = self::$athlete_one->sessions;
        $this->assertEquals($sessions->count(), 1);
        $this->actingAs(self::$athlete_one)
                ->post('/set-groups/', ['sets' => [
                    ['movement_id' => self::$movement_one->id, 'reps' => 5],
                ]]);
        self::$athlete_one->refresh();
        $sessions = self::$athlete_one->sessions;
        $response->assertSuccessful();
        $this->assertEquals($sessions->count(), 1);
        $this->assertEquals($sessions->first()->setGroups->count(), 2);
    }

    public function test_a_user_can_log_heavy_single_with_time_constraint(): void {
        $ten_minutes = 600;
        $this->actingAs(self::$athlete_one)
            ->post('/set-groups/', ['sets' => [
                [
                    'movement_id' => self::$movement_one->id, 
                    'reps' => 1,
                    'performed_time_constraint' => $ten_minutes,
                    'performed_effort' => MovementEffort::HEAVY,
                ],
            ]])->assertSuccessful();
        $set = self::$athlete_one->refresh()
            ->sessions->first()
            ->setGroups->first()
            ->sets->first();
        $this->assertEquals($set->performed_time_constraint, $ten_minutes);
        // ensure $athlete_one sees the sessions they logged
        $this->actingAs(self::$athlete_one)->get('/log')
            ->assertSee(self::$athlete_one->sessions->first()->completed_date);
        // ensure $athlete_two does not
        $this->actingAs(self::$athlete_two)->get('/log')
        ->assertDontSee(self::$athlete_one->sessions->first()->completed_date);
        
    }

}
