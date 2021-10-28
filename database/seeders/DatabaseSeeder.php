<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()

    {
        User::truncate();
        Category::truncate();

    User::factory(2)->create();

        Category::factory([
           $personal= 'name'=> 'Personal',
            'id'=>1
        ]);
        Category::factory([
          $hobby=  'name'=> 'Hobby',
            'id'=>2
        ]);
        Category::factory([
           $work= 'name'=> 'Work',
            'id'=>3
        ]);
          Task::create([

              'category_id'=>3,
              'title'=>'Same shit in diffirent paper',
              'content'=>'LA la la laaaaaaa'
          ]);
    }
}
