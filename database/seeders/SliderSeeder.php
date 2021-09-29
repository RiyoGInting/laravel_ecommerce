<?php

namespace Database\Seeders;

use App\Models\Slider;
use Illuminate\Database\Seeder;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 3; $i++) {
            $slider = new Slider;
            $slider->image = 'upload/slider/slider' . $i . '.jpg';
            $slider->save();
        }
    }
}
