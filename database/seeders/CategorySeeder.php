<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $locategories = [
            '北海道','青森','秋田', '岩手','山形','宮城','福島', '新潟', '茨城', '栃木','群馬', '埼玉', '東京', '千葉', '富山',
            '長野', '山梨', '神奈川', '石川',
            '岐阜', '静岡', '福井', '愛知', '滋賀', '三重', '京都', '大阪', '奈良', '和歌山', '兵庫', '鳥取', '岡山', 
            '香川', '徳島', '島根', '広島', '高知', '愛媛', '山口', '福岡', '大分', '佐賀', '熊本', '宮崎', '長崎', '鹿児島', 
            '沖縄'
        ];
        foreach ($locategories as $category) {
            DB::table('location_categories')->insert([
                'category_name' => $category
            ]);
        }
        $bucategories = [
            'キャバクラ','ガールズバー','ニュークラブ', 'クラブ','スナック','ラウンジ','ガールズラウンジ', '昼キャバ・朝キャバ', '姉キャバ・半熟キャバ', 'ショークラブ',
            'パブクラブ', '熟女キャバクラ', '会員制ラウンジ', '案内所', 'バー', 'コンカフェ', '広告代理店', 'ホスト', 'その他'
        ];
        foreach ($bucategories as $category) {
            DB::table('business_categories')->insert([
                'category_name' => $category
            ]);
        }
        $occategories = [
            'ホールスタッフ・ボーイ','店長・幹部候補','送りドライバー', 'キッチン','ソムリエ','バーテンダー','チラシ配布スタッフ', 'キャッシャー', 'ヘアメイク',
            'webデザイナー', 'パントリー', '経理', '案内所スタッフ', 'キャスト', 'カメラマン', '風俗店舗スタッフ', 'ガールズバーボーイ'
        ];
        foreach ($occategories as $category) {
            DB::table('occupation_categories')->insert([
                'category_name' => $category
            ]);
        }
        $spcategories = [
            '日払いOK','寮・社宅あり','副業・かけもちOK', '週2～3日勤務OK','40代・50代歓迎','社会保険あり','昇給・昇格随時', '週休2日制度',
            '体験入社OK', '賞与あり', '送りあり', '制服貸与', '交通費支給', '食事補助あり', '独立支援あり', '女性も歓迎'
        ];
        foreach ($spcategories as $category) {
            DB::table('speciality_categories')->insert([
                'category_name' => $category
            ]);
        }
    }
}
