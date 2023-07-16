<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Company::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => 1, //default author by user seeder class
            'location_category_id' => 1,
            'logo' => '',
            'title' => 'Club FELIX(フェリクス)',
            'cover_img' => 'storage/companies/cover/IMG_87991688386598.jpeg',
            'description' => '〈学歴，職歴，スキル#すべて不問〉
            熱い想いさえあればどなたでも大丈夫です
            【体験入社も受付中！】',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ];
    }
}
