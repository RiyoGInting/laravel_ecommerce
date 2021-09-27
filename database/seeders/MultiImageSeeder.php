<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MultiImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('multi_images')->insert([
            'product_id' => 1,
            'image' => 'upload/product/multi-image/1712045870381009.jpeg',
        ]);
        DB::table('multi_images')->insert([
            'product_id' => 1,
            'image' => 'upload/product/multi-image/1712045870453199.jpeg',
        ]);
        DB::table('multi_images')->insert([
            'product_id' => 1,
            'image' => 'upload/product/multi-image/1712045870525072.jpeg',
        ]);

        DB::table('multi_images')->insert([
            'product_id' => 2,
            'image' => 'upload/product/multi-image/1712046794572130.jpeg',
        ]);
        DB::table('multi_images')->insert([
            'product_id' => 2,
            'image' => 'upload/product/multi-image/1712046794639060.jpeg',
        ]);

        DB::table('multi_images')->insert([
            'product_id' => 3,
            'image' => 'upload/product/multi-image/1712047467362920.jpeg',
        ]);
        DB::table('multi_images')->insert([
            'product_id' => 3,
            'image' => 'upload/product/multi-image/1712047467445106.jpeg',
        ]);
        DB::table('multi_images')->insert([
            'product_id' => 3,
            'image' => 'upload/product/multi-image/1712047467538907.jpeg',
        ]);

        DB::table('multi_images')->insert([
            'product_id' => 4,
            'image' => 'upload/product/multi-image/1712055180098811.jpeg',
        ]);
        DB::table('multi_images')->insert([
            'product_id' => 4,
            'image' => 'upload/product/multi-image/1712055180169572.jpeg',
        ]);

        DB::table('multi_images')->insert([
            'product_id' => 5,
            'image' => 'upload/product/multi-image/1712055627054843.jpeg',
        ]);
        DB::table('multi_images')->insert([
            'product_id' => 5,
            'image' => 'upload/product/multi-image/1712055627147493.jpeg',
        ]);
    }
}
