<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('items')->insert([
            [
                'category_id' => '1',
                'name' => 'The Slight Edge',
                'value' => 50,
                'quality' => 10
            ],
            [
                'category_id' => '1',
                'name' => 'Code Complete',
                'value' => 50,
                'quality' => 10
            ],
            [
                'category_id' => '1',
                'name' => 'Code Complete',
                'value' => 50,
                'quality' => 10
            ]
            ,[
                'category_id' => '2',
                'name' => 'Business',
                'value' => 20,
                'quality' => 10
            ]
            ,[
                'category_id' => '2',
                'name' => 'Forbes',
                'value' => 20,
                'quality' => 10
            ]
            ,[
                'category_id' => '3',
                'name' => 'Software Developer',
                'value' => 10,
                'quality' => 10
            ]
        ]);
    }
}
