<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'brand_id' => 4,
            'category_id' => 3,
            'subcategory_id' => 7,
            'sublevel_id' => 19,
            'name_en' => 'Monitors Gaming',
            'name_id' => 'Monitor Game',
            'slug_en' => 'monitorsgaming',
            'slug_id' => 'monitorgame',
            'code' => '037027',
            'quantity' => 200,
            'tags_en' => '#tags',
            'tags_id' => '#tags',
            'size_en' => 'Small,Medium,Large',
            'size_id' => 'Kecil,Sedang,Besar',
            'color_en' => 'Black,White',
            'color_id' => 'Hitam,Putih',
            'price' => 500,
            'short_description_en' => 'Lorem ipsum',
            'short_description_id' => 'Lorem ipsum',
            'long_description_en' => 'Lorem ipsum dolor sit amet, consectetur adipis',
            'long_description_id' => 'Lorem ipsum dolor sit amet, consectetur adipis',
            'thumbnail' => 'upload/product/thumbnail/1712045870312447.jpeg',
            'status' => 1,
        ]);

        DB::table('products')->insert([
            'brand_id' => 2,
            'category_id' => 3,
            'subcategory_id' => 7,
            'sublevel_id' => 20,
            'name_en' => 'Printers',
            'name_id' => 'Printer',
            'slug_en' => 'printers',
            'slug_id' => 'printer',
            'code' => '074631',
            'quantity' => 150,
            'tags_en' => '##tags,printers',
            'tags_id' => '##tags,printer',
            'color_en' => 'Black,White',
            'color_id' => 'Hitam,Putih',
            'price' => 400,
            'short_description_en' => 'Lorem ipsum',
            'short_description_id' => 'Lorem ipsum',
            'long_description_en' => 'Lorem ipsum dolor sit amet, consectetur adipis',
            'long_description_id' => 'Lorem ipsum dolor sit amet, consectetur adipis',
            'thumbnail' => 'upload/product/thumbnail/1712046794501265.jpeg',
            'status' => 1,
        ]);

        DB::table('products')->insert([
            'brand_id' => 6,
            'category_id' => 4,
            'subcategory_id' => 11,
            'sublevel_id' => 31,
            'name_en' => 'X Sneakers',
            'name_id' => 'X Sneakers',
            'slug_en' => 'xsneakers',
            'slug_id' => 'xsneakers',
            'code' => '890763',
            'quantity' => 50,
            'tags_en' => '##tags,sneakers',
            'tags_id' => '##tags,sneakers',
            'color_en' => 'Black,White',
            'color_id' => 'Hitam,Putih',
            'price' => 400,
            'short_description_en' => 'Lorem ipsum',
            'short_description_id' => 'Lorem ipsum',
            'long_description_en' => 'Lorem ipsum dolor sit amet, consectetur adipis',
            'long_description_id' => 'Lorem ipsum dolor sit amet, consectetur adipis',
            'thumbnail' => 'upload/product/thumbnail/1712047467278940.jpeg',
            'status' => 1,
        ]);

        DB::table('products')->insert([
            'brand_id' => 1,
            'category_id' => 3,
            'subcategory_id' => 8,
            'sublevel_id' => 22,
            'name_en' => 'Gaming Keyboard',
            'name_id' => 'Keyboard Game',
            'slug_en' => 'gamingkeyboard',
            'slug_id' => 'keyboardgame',
            'code' => '784625',
            'quantity' => 50,
            'tags_en' => '##tags,game',
            'tags_id' => '##tags,game',
            'color_en' => 'Black,White',
            'color_id' => 'Hitam,Putih',
            'price' => 400,
            'short_description_en' => 'Lorem ipsum',
            'short_description_id' => 'Lorem ipsum',
            'long_description_en' => 'Lorem ipsum dolor sit amet, consectetur adipis',
            'long_description_id' => 'Lorem ipsum dolor sit amet, consectetur adipis',
            'thumbnail' => 'upload/product/thumbnail/1712055180031646.jpeg',
            'status' => 1,
        ]);

        DB::table('products')->insert([
            'brand_id' => 3,
            'category_id' => 4,
            'subcategory_id' => 12,
            'sublevel_id' => 36,
            'name_en' => 'T Shirt',
            'name_id' => 'Kaos',
            'slug_en' => 'tshirt',
            'slug_id' => 'kaos',
            'code' => '347689',
            'quantity' => 50,
            'tags_en' => '##tags,man',
            'tags_id' => '##tags,man',
            'color_en' => 'Black,White',
            'color_id' => 'Hitam,Putih',
            'price' => 400,
            'short_description_en' => 'Lorem ipsum',
            'short_description_id' => 'Lorem ipsum',
            'long_description_en' => 'Lorem ipsum dolor sit amet, consectetur adipis',
            'long_description_id' => 'Lorem ipsum dolor sit amet, consectetur adipis',
            'thumbnail' => 'upload/product/thumbnail/1712055626968535.jpeg',
            'status' => 1,
        ]);
    }
}
