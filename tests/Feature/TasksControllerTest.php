<?php

namespace Tests\Feature;

use App\Models\Task;
use App\Models\User;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;


class TasksControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_we_can_visit_tasks_page(): void
    {
        /** @var Authenticatable $user */

        $user = User::factory()->make();
        $this->actingAs($user);

        $response = $this->get(route('tasks.index'));
        $response->assertStatus(200);
        $response->assertViewIs('tasks.index');
        $response->assertViewHas(['tasks']);
    }

    public function test_we_can_visit_tasks_create_page(): void
    {
        /**@var  Authenticatable $user */
        $user = User::factory()->make();
        $this->actingAs($user);

        $response = $this->get(route('tasks.create'));
        $response->assertStatus(200);
        $response->assertViewIs('tasks.create');
    }

    public function test_can_we_visit_tasks(): void
    {
        /**@var  Authenticatable $user */
        $user = User::factory()->make();
        $this->actingAs($user);

        $response = $this->get('/tasks');

        $response->assertStatus(200);
    }

    public function test_can_we_visit_edit(): void
    {
        /**@var  Authenticatable $user */
        $user = User::factory()->make();
        $this->actingAs($user);

        $response = $this->get('/dashboard');

        $response->assertStatus(200);
    }

    public function test_mark_task_as_completed(): void
    {
        /**@var  User $user */
        $user = User::factory()->create();

        $this->actingAs($user);

        $task = Task::factory()->create([
            'user_id'=>$user->id,
            'completed_at'=>now()
        ]);



        $response = $this->post(route('tasks.complete',$task));

        $response->assertStatus(200);
        $this->assertDatabaseHas('tasks',[
            'id'=>$task->id,
            'completed_at'=>now(),
        ]);

    }




}
