<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Company;
use App\Models\Post;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $details = [
            [
                'title' => 'Club FELIX(フェリクス)',
            ], 
        ];
        //user id is 2 that has author role
        $company = Company::factory()->create([
            'location_category_id' => 1,
            'logo' => '',
            'title' => 'Club FELIX(フェリクス)',
            'cover_img' => 'storage/companies/cover/IMG_87991688386598.jpeg',
            'description' => '〈学歴，職歴，スキル#すべて不問〉
            熱い想いさえあればどなたでも大丈夫です
            【体験入社も受付中！】',
        ]);
        foreach ($details as $index => $detail) {
            $post = Post::factory()->create([
                'company_id' => $company->id,
            ]);
        }
    }
}
