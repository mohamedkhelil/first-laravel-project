<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ActiveAccountMiddlewareTest extends TestCase
{
    use RefreshDatabase;

    public function test_inactive_users_are_redirected_away_from_task_routes(): void
    {
        $user = User::factory()->create();
        $user->forceFill(['is_active' => false])->save();

        $response = $this->actingAs($user)->get('/tasks');

        $response->assertRedirect('/');
    }
}
