<?php

namespace Tests\Feature;

use App\Models\Task;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TaskAuthorizationTest extends TestCase
{
    use RefreshDatabase;

    private const TASKS_URI = '/tasks';

    public function test_guest_is_redirected_from_tasks_pages(): void
    {
        $this->get(self::TASKS_URI)->assertRedirect(route('login'));
    }

    public function test_user_only_sees_their_own_tasks(): void
    {
        $user = User::factory()->create();
        $otherUser = User::factory()->create();

        Task::create([
            'title' => 'My task',
            'description' => 'Visible task',
            'completed' => false,
            'user_id' => $user->id,
        ]);

        Task::create([
            'title' => 'Other task',
            'description' => 'Hidden task',
            'completed' => false,
            'user_id' => $otherUser->id,
        ]);

        $response = $this->actingAs($user)->get(self::TASKS_URI);

        $response->assertOk();
        $response->assertSee('My task');
        $response->assertDontSee('Other task');
    }

    public function test_user_cannot_update_another_users_task(): void
    {
        $user = User::factory()->create();
        $otherUser = User::factory()->create();

        $task = Task::create([
            'title' => 'Protected task',
            'description' => 'Owned by someone else',
            'completed' => false,
            'user_id' => $otherUser->id,
        ]);

        $this->actingAs($user)
            ->put("/tasks/{$task->id}", [
                'title' => 'Changed title',
                'description' => 'Changed description',
            ])
            ->assertForbidden();
    }

    public function test_user_can_create_a_task_for_their_account(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->post(self::TASKS_URI, [
                'title' => 'New task',
                'description' => 'Created from test',
            ])
            ->assertRedirect(route('tasks.index'));

        $this->assertDatabaseHas('tasks', [
            'title' => 'New task',
            'user_id' => $user->id,
        ]);
    }
}
