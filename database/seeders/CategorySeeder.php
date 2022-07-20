<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        DB::table('primary_categories')->insert([
            [
                'name' => 'パソコン・周辺機器',
                'sort_order' => 1,
            ],
            [
                'name' => 'タブレットPC・スマートフォン',
                'sort_order' => 2,
            ],
            [
                'name' => 'TV・オーディオ・カメラ',
                'sort_order' => 3,
            ],
        ]);

        DB::table('secondary_categories')->insert([
            [
                'name' => 'パソコン',
                'sort_order' => 1,
                'primary_category_id' => 1,
            ],
            [
                'name' => '外付けドライブ・ストレージ',
                'sort_order' => 2,
                'primary_category_id' => 1,
            ],
            [
                'name' => 'ICカードリーダー・ライター',
                'sort_order' => 3,
                'primary_category_id' => 1,
            ],
            [
                'name' => 'タブレットPC本体',
                'sort_order' => 1,
                'primary_category_id' => 2,
            ],
            [
                'name' => 'スマートフォン本体',
                'sort_order' => 2,
                'primary_category_id' => 2,
            ],
            [
                'name' => 'タブレットPCアクセサリー',
                'sort_order' => 3,
                'primary_category_id' => 2,
            ],
            [
                'name' => 'スマートフォンアクセサリー',
                'sort_order' => 3,
                'primary_category_id' => 2,
            ],
        ]);
    }
}
