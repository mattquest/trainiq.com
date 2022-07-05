<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Tests\Feature\TCreatesFeatureTestData;

class FeatureTestBase extends TestCase
{
    use TCreatesFeatureTestData;
    use RefreshDatabase;

    public function setup(): void {
        parent::setup();
        self::createFeatureTestData();
    }

    public function test_the_application_returns_a_successful_response()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

}
