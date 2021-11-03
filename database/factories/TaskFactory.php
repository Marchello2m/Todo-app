<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{

    public function definition()
    {
        return [
            'user_id'=>null,
           'title'=>$this->faker->sentence,
            'content'=>$this->faker->text,
            'completed_at'=>null,
            'category_id'=>1
        ];
    }
}
