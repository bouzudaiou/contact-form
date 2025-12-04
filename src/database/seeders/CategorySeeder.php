<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create(['content' => '商品']);
        Category::create(['content' => '修理']);
        Category::create(['content' => '支払い方法']);
    }
}
