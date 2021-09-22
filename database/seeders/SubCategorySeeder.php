<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sub_categories')->insert([
            'category_id' => 1,
            'name_en' => 'Refrigerators',
            'name_id' => 'Kulkas',
            'slug_en' => 'refrigerators',
            'slug_id' => 'kulkas',
        ]);

        DB::table('sub_categories')->insert([
            'category_id' => 1,
            'name_en' => 'Televisions',
            'name_id' => 'Televisi',
            'slug_en' => 'televisions',
            'slug_id' => 'televisi',
        ]);

        DB::table('sub_categories')->insert([
            'category_id' => 1,
            'name_en' => 'Washing Machines',
            'name_id' => 'Mesin Cuci',
            'slug_en' => 'washingmachines',
            'slug_id' => 'mesincuci',
        ]);

        DB::table('sub_categories')->insert([
            'category_id' => 2,
            'name_en' => 'Beauty and Personal Care',
            'name_id' => 'Kecantikan dan Perawatan Pribadi',
            'slug_en' => 'beautyandpersonalcare',
            'slug_id' => 'kecantikandanperawatanpribadi',
        ]);

        DB::table('sub_categories')->insert([
            'category_id' => 2,
            'name_en' => 'Baby Care',
            'name_id' => 'Perawatan Bayi',
            'slug_en' => 'babycare',
            'slug_id' => 'perawatanbayi',
        ]);

        DB::table('sub_categories')->insert([
            'category_id' => 2,
            'name_en' => 'Food and Drinks',
            'name_id' => 'Kecantikan dan Perawatan Pribadi',
            'slug_en' => 'foodanddrinks',
            'slug_id' => 'kecantikandanperawatanpribadi',
        ]);

        DB::table('sub_categories')->insert([
            'category_id' => 3,
            'name_en' => 'Computer Peripherals',
            'name_id' => 'Perlengkapan Komputer',
            'slug_en' => 'computerperipherals',
            'slug_id' => 'perlengkapankomputer',
        ]);

        DB::table('sub_categories')->insert([
            'category_id' => 3,
            'name_en' => 'Gaming',
            'name_id' => 'Permainan',
            'slug_en' => 'gaming',
            'slug_id' => 'permainan',
        ]);

        DB::table('sub_categories')->insert([
            'category_id' => 3,
            'name_en' => 'Mobile Accessory',
            'name_id' => 'Aksesori Seluler',
            'slug_en' => 'mobileaccessory',
            'slug_id' => 'aksesoriseluler',
        ]);

        DB::table('sub_categories')->insert([
            'category_id' => 4,
            'name_en' => 'Men Bottom Ware',
            'name_id' => 'Pakaian Bawahan Pria',
            'slug_en' => 'menbottomware',
            'slug_id' => 'pakaianbawahanpria',
        ]);

        DB::table('sub_categories')->insert([
            'category_id' => 4,
            'name_en' => 'Men Footwear',
            'name_id' => 'Alas Kaki Pria',
            'slug_en' => 'menfootwear',
            'slug_id' => 'alaskakipria',
        ]);

        DB::table('sub_categories')->insert([
            'category_id' => 4,
            'name_en' => 'Men Top Ware',
            'name_id' => 'Perlengkapan Atasan Pria',
            'slug_en' => 'mentopware',
            'slug_id' => 'perlengkapanatasanpria',
        ]);

        DB::table('sub_categories')->insert([
            'category_id' => 4,
            'name_en' => 'Women Footwear',
            'name_id' => 'Alas Kaki Wanita',
            'slug_en' => 'womenfootwear',
            'slug_id' => 'alaskakiwanita',
        ]);

        DB::table('sub_categories')->insert([
            'category_id' => 5,
            'name_en' => 'Home Decor',
            'name_id' => 'Dekorasi Rumah',
            'slug_en' => 'homedecor',
            'slug_id' => 'dekorasirumah',
        ]);

        DB::table('sub_categories')->insert([
            'category_id' => 5,
            'name_en' => 'Home Furnishings',
            'name_id' => 'Perabotan Rumah',
            'slug_en' => 'homefurnishings',
            'slug_id' => 'perabotanrumah',
        ]);

        DB::table('sub_categories')->insert([
            'category_id' => 5,
            'name_en' => 'Living Room',
            'name_id' => 'Ruang Tamu',
            'slug_en' => 'livingroom',
            'slug_id' => 'ruangtamu',
        ]);
    }
}
