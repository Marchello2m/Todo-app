<?php
namespace Tests\Unit;

use App\Models\Task;

use App\Models\User;
use Illuminate\Auth\Authenticatable;

use Illuminate\Foundation\Testing\TestCase;

class TaskControllerTest extends TestCase
{

    public function test_we_can_visit_task_page():void
    { /**
     * A basic test example.
     *
     * @return void
     */
        /**@var  Authenticatable $user */
        $user = User::factory()->make();

        $this->actingAs($user);

        $this->followingRedirects();
        $response =$this->get(route('tasks.index'));
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

    public function testTaskReturnsTrue()
    {
      $this->assertTrue(true);
    }

    public function createApplication()
    {
        // TODO: Implement createApplication() method.
    }
}
