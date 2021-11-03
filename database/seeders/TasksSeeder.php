<?php

namespace Database\Seeders;

use App\Models\Task;
use Illuminate\Database\Seeder;

class TasksSeeder extends Seeder
{

    public function run()
    {
        Task::factory(10)->create();
    }
}
