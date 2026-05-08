<?php

namespace Tests\Feature;

use App\Models\Task;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminTaskAccessTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_see_all_tasks(): void
    {
        $admin = User::factory()->create();
        $admin->forceFill(['is_admin' => true])->save();

        $owner = User::factory()->create();

        Task::create([
            'title' => 'Admin task',
            'description' => 'Visible',
            'completed' => false,
            'priority' => 'moyenne',
            'user_id' => $admin->id,
        ]);

        Task::create([
            'title' => 'Other user task',
            'description' => 'Also visible to admin',
            'completed' => false,
            'priority' => 'moyenne',
            'user_id' => $owner->id,
        ]);

        $response = $this->actingAs($admin)->get('/tasks');

        $response->assertOk();
        $response->assertSee('Admin task');
        $response->assertSee('Other user task');
    }
}
