<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TasksControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_we_can_visit_tasks_page():void
    {
/** @var Authenticatable $user */

        $user=User::factory()->make();
        $this->actingAs($user);

        $response = $this->get(route('tasks.index'));
        $response->assertStatus(200);
        $response->assertViewIs('tasks.index');
        $response->assertViewHas(['tasks']);
    }
    public function test_we_can_visit_tasks_create_page():void
    {
        /**@var  Authenticatable $user */
        $user= User::factory()->make();
        $this->actingAs($user);

        $response=$this->get(route('tasks.create'));
        $response->assertStatus(200);
        $response->assertViewIs('tasks.create');
    }
    public function test_can_we_visit_form():void
    {
        /**@var  Authenticatable $user */
        $user= User::factory()->make();
        $this->actingAs($user);

        $response=$this->get(route('task.edit'));
        $response->assertStatus(200);
        $response->assertViewIs('task.edit');
    }

    public function testTaskReturnsTrue()
    {
        $this->assertTrue(true);
    }

}
