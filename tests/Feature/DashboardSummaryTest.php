<?php

namespace Tests\Feature;

use App\Models\Task;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DashboardSummaryTest extends TestCase
{
    use RefreshDatabase;

    public function test_dashboard_shows_task_counts_for_the_authenticated_user(): void
    {
        $user = User::factory()->create();

        Task::create([
            'title' => 'Done task',
            'description' => 'Finished',
            'completed' => true,
            'priority' => 'haute',
            'user_id' => $user->id,
        ]);

        Task::create([
            'title' => 'Open task',
            'description' => 'Pending',
            'completed' => false,
            'priority' => 'basse',
            'user_id' => $user->id,
        ]);

        $response = $this->actingAs($user)->get('/dashboard');

        $response->assertOk();
        $response->assertSee('Vous avez 2 taches');
        $response->assertSee('dont 1 completees');
    }
}
