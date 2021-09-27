<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sliders')->insert([
            'image' => 'upload/slider/1712041564507498.jpg',
        ]);

        DB::table('sliders')->insert([
            'image' => 'upload/slider/1712041588856740.jpg',
        ]);

        DB::table('sliders')->insert([
            'image' => 'upload/slider/1712041597140611.jpg',
        ]);
    }
}
