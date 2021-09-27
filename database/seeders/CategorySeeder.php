<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name_en' => 'Appliances',
            'name_id' => 'Peralatan',
            'slug_en' => 'appliances',
            'slug_id' => 'peralatan',
            'icon' => 'fa fa-shopping-bag',
        ]);

        DB::table('categories')->insert([
            'name_en' => 'Beauty',
            'name_id' => 'Kecantikan',
            'slug_en' => 'beauty',
            'slug_id' => 'kecantikan',
            'icon' => 'fa fa-heartbeat',
        ]);

        DB::table('categories')->insert([
            'name_en' => 'Electronics',
            'name_id' => 'Elektronik',
            'slug_en' => 'electronics',
            'slug_id' => 'elektronik',
            'icon' => 'fa fa-user',
        ]);

        DB::table('categories')->insert([
            'name_en' => 'Fashion',
            'name_id' => 'Mode',
            'slug_en' => 'fashion',
            'slug_id' => 'mode',
            'icon' => 'fa fa-diamond',
        ]);

        DB::table('categories')->insert([
            'name_en' => 'Sweet Home',
            'name_id' => 'Rumah',
            'slug_en' => 'home',
            'slug_id' => 'rumah',
            'icon' => 'fa fa-shopping-cart',
        ]);
    }
}
