<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brands = ['Apple', 'Huawei', 'Oppo', 'Samsung', 'Xiaomi', 'Vivo'];

        for ($i = 0; $i < count($brands); $i++) {
            $brand = new Brand;
            $brand->name_en = $brands[$i];
            $brand->name_id = $brands[$i];
            $brand->slug_en = strtolower($brands[$i]);
            $brand->slug_id = strtolower($brands[$i]);
            $brand->image = 'upload/brand/brand' . $i . '.png';
            $brand->save();
        }
    }
}
