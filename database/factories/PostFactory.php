<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'company_id' => '',
            'occategory' => '',
            'bucategory' => '', // password
            'vacancy_count' => '',
            'spcategory' => '',
            'deadline' => date("Y-m-d H:i:s", strtotime(date("Y-m-d H:i:s") . " +2 days")),
            'salary' => '',
            'locategory' => '',
            'experience' => '',
            'description' => '',
            'views' => '',
        ];
    }
}
