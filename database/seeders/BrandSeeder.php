<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('brands')->insert([
            'name_en' => 'Apple',
            'name_id' => 'Apple',
            'slug_en' => 'apple',
            'slug_id' => 'apple',
            'image' => 'upload/brand/1711583915632236.png',
        ]);

        DB::table('brands')->insert([
            'name_en' => 'Huawei',
            'name_id' => 'Huawei',
            'slug_en' => 'huawei',
            'slug_id' => 'huawei',
            'image' => 'upload/brand/1711583943702090.png',
        ]);

        DB::table('brands')->insert([
            'name_en' => 'Oppo',
            'name_id' => 'Oppo',
            'slug_en' => 'oppo',
            'slug_id' => 'oppo',
            'image' => 'upload/brand/1711583958624738.png',
        ]);

        DB::table('brands')->insert([
            'name_en' => 'Samsung',
            'name_id' => 'Samsung',
            'slug_en' => 'samsung',
            'slug_id' => 'samsung',
            'image' => 'upload/brand/1711584006032120.png',
        ]);

        DB::table('brands')->insert([
            'name_en' => 'Vivo',
            'name_id' => 'Vivo',
            'slug_en' => 'vivo',
            'slug_id' => 'vivo',
            'image' => 'upload/brand/1711584091631377.png',
        ]);

        DB::table('brands')->insert([
            'name_en' => 'Xiaomi',
            'name_id' => 'Xiaomi',
            'slug_en' => 'xiaomi',
            'slug_id' => 'xiaomi',
            'image' => 'upload/brand/1711584051528895.png',
        ]);
    }
}
