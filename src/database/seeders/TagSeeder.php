<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tag;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tag::create(['name' => '緊急']);
        Tag::create(['name' => '要返信']);
        Tag::create(['name' => '技術的質問']);
        Tag::create(['name' => 'クレーム']);
    }
}
