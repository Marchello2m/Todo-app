<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run()

    {
 // $this->call(UsersSeeder::class);
  //$this->call(TasksSeeder::class);
        User::factory(5)->create([
            'password'=>bcrypt('codelex')
        ])->each(function(User $user){
         Task::factory(10)->create([
             'user_id'=>$user->id
         ]);
        });
    }
}
