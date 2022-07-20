<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'name' => 'test1',
                'information' => 'information1',
                'price' => 1000,
                'is_selling' => true,
                'sort_order' => 1,
                'shop_id' => 1,
                'secondary_category_id' => 1,
                'image1' => 1,
            ],
            [
                'name' => 'test2',
                'information' => 'information2',
                'price' => 1000,
                'is_selling' => true,
                'sort_order' => 2,
                'shop_id' => 1,
                'secondary_category_id' => 2,
                'image1' => 2,
            ],
            [
                'name' => 'test3',
                'information' => 'information3',
                'price' => 1000,
                'is_selling' => true,
                'sort_order' => 3,
                'shop_id' => 1,
                'secondary_category_id' => 3,
                'image1' => 3,
            ],
        ]);
    }
}
