<?php

namespace Database\Seeders;

use App\Models\MultiImage;
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
        for ($i = 0; $i < 400; $i++) {
            $multi_image = new MultiImage;
            $multi_image->product_id = rand(1, 200);
            $multi_image->image = 'upload/product/multi-image/p' . rand(1, 47) . '.jpeg';
            $multi_image->save();
        }
        DB::table('multi_images')->insert([
            'product_id' => 1,
            'image' => 'upload/product/multi-image/1712045870381009.jpeg',
        ]);
    }
}
