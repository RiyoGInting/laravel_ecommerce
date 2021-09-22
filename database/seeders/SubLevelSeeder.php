<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sub_levels')->insert([
            'category_id' => 1,
            'subcategory_id' => 1,
            'name_en' => 'Double Door',
            'name_id' => 'Pintu Ganda',
            'slug_en' => 'doubledoor',
            'slug_id' => 'pintuganda',
        ]);

        DB::table('sub_levels')->insert([
            'category_id' => 1,
            'subcategory_id' => 1,
            'name_en' => 'Mini Rerigerators',
            'name_id' => 'Kulkas Mini',
            'slug_en' => 'minirerigerators',
            'slug_id' => 'kulkasmini',
        ]);

        DB::table('sub_levels')->insert([
            'category_id' => 1,
            'subcategory_id' => 1,
            'name_en' => 'Single Door',
            'name_id' => 'Satu Pintu',
            'slug_en' => 'singledoor',
            'slug_id' => 'satupintu',
        ]);

        DB::table('sub_levels')->insert([
            'category_id' => 1,
            'subcategory_id' => 2,
            'name_en' => 'Big Screen TV',
            'name_id' => 'TV Layar Besar',
            'slug_en' => 'bigscreentv',
            'slug_id' => 'tvlayarbesar',
        ]);

        DB::table('sub_levels')->insert([
            'category_id' => 1,
            'subcategory_id' => 2,
            'name_en' => 'Smart TV',
            'name_id' => 'TV Pintar',
            'slug_en' => 'smarttv',
            'slug_id' => 'tvpintar',
        ]);

        DB::table('sub_levels')->insert([
            'category_id' => 1,
            'subcategory_id' => 2,
            'name_en' => 'LED TV',
            'name_id' => 'LED TV',
            'slug_en' => 'ledtv',
            'slug_id' => 'ledtv',
        ]);

        DB::table('sub_levels')->insert([
            'category_id' => 1,
            'subcategory_id' => 3,
            'name_en' => 'Energy Efficient',
            'name_id' => 'Hemat Energi',
            'slug_en' => 'energyefficient',
            'slug_id' => 'hematenergi',
        ]);

        DB::table('sub_levels')->insert([
            'category_id' => 1,
            'subcategory_id' => 3,
            'name_en' => 'Washer',
            'name_id' => 'Mesin Cuci',
            'slug_en' => 'washer',
            'slug_id' => 'mesincuci',
        ]);

        DB::table('sub_levels')->insert([
            'category_id' => 1,
            'subcategory_id' => 3,
            'name_en' => 'Washer and Dryers',
            'name_id' => 'Mesin Cuci dan Pengering',
            'slug_en' => 'washeranddryers',
            'slug_id' => 'mesincucidanpengering',
        ]);

        DB::table('sub_levels')->insert([
            'category_id' => 2,
            'subcategory_id' => 4,
            'name_en' => 'Eye Makeup',
            'name_id' => 'Riasan Mata',
            'slug_en' => 'eyemakeup',
            'slug_id' => 'riasanmata',
        ]);

        DB::table('sub_levels')->insert([
            'category_id' => 2,
            'subcategory_id' => 4,
            'name_en' => 'Hair Care',
            'name_id' => 'Perawatan Rambut',
            'slug_en' => 'haircare',
            'slug_id' => 'perawatanrambut',
        ]);

        DB::table('sub_levels')->insert([
            'category_id' => 2,
            'subcategory_id' => 5,
            'name_en' => 'Baby Diapers',
            'name_id' => 'Popok Bayi',
            'slug_en' => 'babydiapers',
            'slug_id' => 'popokbayi',
        ]);

        DB::table('sub_levels')->insert([
            'category_id' => 2,
            'subcategory_id' => 5,
            'name_en' => 'Baby Food',
            'name_id' => 'Makanan Bayi',
            'slug_en' => 'babyfood',
            'slug_id' => 'makananbayi',
        ]);

        DB::table('sub_levels')->insert([
            'category_id' => 2,
            'subcategory_id' => 5,
            'name_en' => 'Baby Wipes',
            'name_id' => 'Tisu Bayi',
            'slug_en' => 'babywipes',
            'slug_id' => 'tisubayi',
        ]);

        DB::table('sub_levels')->insert([
            'category_id' => 2,
            'subcategory_id' => 6,
            'name_en' => 'Beverages',
            'name_id' => 'Minuman',
            'slug_en' => 'beverages',
            'slug_id' => 'minuman',
        ]);

        DB::table('sub_levels')->insert([
            'category_id' => 2,
            'subcategory_id' => 6,
            'name_en' => 'Chocolates',
            'name_id' => 'Cokelat',
            'slug_en' => 'chocolates',
            'slug_id' => 'cokelat',
        ]);

        DB::table('sub_levels')->insert([
            'category_id' => 2,
            'subcategory_id' => 6,
            'name_en' => 'Snacks',
            'name_id' => 'Makanan Ringan',
            'slug_en' => 'snacks',
            'slug_id' => 'makananringan',
        ]);

        DB::table('sub_levels')->insert([
            'category_id' => 2,
            'subcategory_id' => 4,
            'name_en' => 'Lip Makeup',
            'name_id' => 'Riasan Bibir',
            'slug_en' => 'lipmakeup',
            'slug_id' => 'riasanbibir',
        ]);

        DB::table('sub_levels')->insert([
            'category_id' => 3,
            'subcategory_id' => 7,
            'name_en' => 'Monitors',
            'name_id' => 'Monitor',
            'slug_en' => 'monitors',
            'slug_id' => 'monitor',
        ]);

        DB::table('sub_levels')->insert([
            'category_id' => 3,
            'subcategory_id' => 7,
            'name_en' => 'Printers',
            'name_id' => 'Printer',
            'slug_en' => 'printers',
            'slug_id' => 'printer',
        ]);

        DB::table('sub_levels')->insert([
            'category_id' => 3,
            'subcategory_id' => 7,
            'name_en' => 'Projectors',
            'name_id' => 'Proyektor',
            'slug_en' => 'projectors',
            'slug_id' => 'proyektor',
        ]);

        DB::table('sub_levels')->insert([
            'category_id' => 3,
            'subcategory_id' => 8,
            'name_en' => 'Gaming Keyboars',
            'name_id' => 'Keyboard Game',
            'slug_en' => 'gamingkeyboars',
            'slug_id' => 'keyboardgame',
        ]);

        DB::table('sub_levels')->insert([
            'category_id' => 3,
            'subcategory_id' => 8,
            'name_en' => 'Gaming Mouse',
            'name_id' => 'Mouse Game',
            'slug_en' => 'gamingmouse',
            'slug_id' => 'mousegame',
        ]);

        DB::table('sub_levels')->insert([
            'category_id' => 3,
            'subcategory_id' => 8,
            'name_en' => 'Gamepads',
            'name_id' => 'Gamepad',
            'slug_en' => 'gamepads',
            'slug_id' => 'gamepad',
        ]);

        DB::table('sub_levels')->insert([
            'category_id' => 3,
            'subcategory_id' => 9,
            'name_en' => 'Designer Cases',
            'name_id' => 'Kasing Desainer',
            'slug_en' => 'designercases',
            'slug_id' => 'kasingdesainer',
        ]);

        DB::table('sub_levels')->insert([
            'category_id' => 3,
            'subcategory_id' => 9,
            'name_en' => 'Plain Cases',
            'name_id' => 'Kasing Biasa',
            'slug_en' => 'plaincases',
            'slug_id' => 'kasingbiasa',
        ]);

        DB::table('sub_levels')->insert([
            'category_id' => 3,
            'subcategory_id' => 9,
            'name_en' => 'Screen Guards',
            'name_id' => 'Pelindung Layar',
            'slug_en' => 'screenguards',
            'slug_id' => 'pelindunglayar',
        ]);

        DB::table('sub_levels')->insert([
            'category_id' => 4,
            'subcategory_id' => 10,
            'name_en' => 'Men Cargos',
            'name_id' => 'Kargo Pria',
            'slug_en' => 'mencargos',
            'slug_id' => 'kargopria',
        ]);

        DB::table('sub_levels')->insert([
            'category_id' => 4,
            'subcategory_id' => 10,
            'name_en' => 'Men Jeans',
            'name_id' => 'Jeans Pria',
            'slug_en' => 'menjeans',
            'slug_id' => 'jeanspria',
        ]);

        DB::table('sub_levels')->insert([
            'category_id' => 4,
            'subcategory_id' => 10,
            'name_en' => 'Men Trousers',
            'name_id' => 'Celana Pria',
            'slug_en' => 'mentrousers',
            'slug_id' => 'celanapria',
        ]);

        DB::table('sub_levels')->insert([
            'category_id' => 4,
            'subcategory_id' => 11,
            'name_en' => 'Men Casual Shoes',
            'name_id' => 'Sepatu Kasual Pria',
            'slug_en' => 'mencasualshoes',
            'slug_id' => 'sepatukasualpria',
        ]);

        DB::table('sub_levels')->insert([
            'category_id' => 4,
            'subcategory_id' => 11,
            'name_en' => 'Men Formal Shoes',
            'name_id' => 'Sepatu Formal Pria',
            'slug_en' => 'menformalshoes',
            'slug_id' => 'sepatuformalpria',
        ]);

        DB::table('sub_levels')->insert([
            'category_id' => 4,
            'subcategory_id' => 11,
            'name_en' => 'Men Sports Shoes',
            'name_id' => 'Sepatu Olahraga Pria',
            'slug_en' => 'mensportsshoes',
            'slug_id' => 'sepatuolahragapria',
        ]);

        DB::table('sub_levels')->insert([
            'category_id' => 4,
            'subcategory_id' => 12,
            'name_en' => 'Men Casual Shirts',
            'name_id' => 'Kemeja Kasual Pria',
            'slug_en' => 'mencasualshirts',
            'slug_id' => 'kemejakasualpria',
        ]);

        DB::table('sub_levels')->insert([
            'category_id' => 4,
            'subcategory_id' => 12,
            'name_en' => 'Men Kurtas',
            'name_id' => 'Kurtas Pria',
            'slug_en' => 'menkurtas',
            'slug_id' => 'kurtaspria',
        ]);

        DB::table('sub_levels')->insert([
            'category_id' => 4,
            'subcategory_id' => 12,
            'name_en' => 'Men Tshirt',
            'name_id' => 'Kaos Pria',
            'slug_en' => 'mentshirt',
            'slug_id' => 'kaospria',
        ]);

        DB::table('sub_levels')->insert([
            'category_id' => 4,
            'subcategory_id' => 13,
            'name_en' => 'Women Flats Shoes',
            'name_id' => 'Sepatu Flat Wanita',
            'slug_en' => 'womenflatsshoes',
            'slug_id' => 'sepatuflatwanita',
        ]);

        DB::table('sub_levels')->insert([
            'category_id' => 4,
            'subcategory_id' => 13,
            'name_en' => 'Women Heels',
            'name_id' => 'Sepatu Hak Wanita',
            'slug_en' => 'womenheels',
            'slug_id' => 'sepatuhakanita',
        ]);

        DB::table('sub_levels')->insert([
            'category_id' => 4,
            'subcategory_id' => 13,
            'name_en' => 'Woman Sheakers',
            'name_id' => 'Sepatu Kets Wanita',
            'slug_en' => 'womansheakers',
            'slug_id' => 'sepatuketswanita',
        ]);

        DB::table('sub_levels')->insert([
            'category_id' => 5,
            'subcategory_id' => 14,
            'name_en' => 'Clocks',
            'name_id' => 'Jam',
            'slug_en' => 'clocks',
            'slug_id' => 'jam',
        ]);

        DB::table('sub_levels')->insert([
            'category_id' => 5,
            'subcategory_id' => 14,
            'name_en' => 'Lightings',
            'name_id' => 'Pencahayaan',
            'slug_en' => 'lightings',
            'slug_id' => 'pencahayaan',
        ]);

        DB::table('sub_levels')->insert([
            'category_id' => 5,
            'subcategory_id' => 14,
            'name_en' => 'Wall Decor',
            'name_id' => 'Hiasan Dinding',
            'slug_en' => 'walldecor',
            'slug_id' => 'hiasandinding',
        ]);

        DB::table('sub_levels')->insert([
            'category_id' => 5,
            'subcategory_id' => 15,
            'name_en' => 'Blankets',
            'name_id' => 'Selimut',
            'slug_en' => 'blankets',
            'slug_id' => 'selimut',
        ]);

        DB::table('sub_levels')->insert([
            'category_id' => 5,
            'subcategory_id' => 15,
            'name_en' => 'Bed Liners',
            'name_id' => 'Pelapis Tempat Tidur',
            'slug_en' => 'bedliners',
            'slug_id' => 'pelapistempattidur',
        ]);

        DB::table('sub_levels')->insert([
            'category_id' => 5,
            'subcategory_id' => 15,
            'name_en' => 'Bedsheets',
            'name_id' => 'Seprai',
            'slug_en' => 'bedsheets',
            'slug_id' => 'seprai',
        ]);

        DB::table('sub_levels')->insert([
            'category_id' => 5,
            'subcategory_id' => 16,
            'name_en' => 'Coffee Tables',
            'name_id' => 'Meja Kopi',
            'slug_en' => 'coffeetables',
            'slug_id' => 'mejakopi',
        ]);

        DB::table('sub_levels')->insert([
            'category_id' => 5,
            'subcategory_id' => 16,
            'name_en' => 'Dining Sets',
            'name_id' => 'Set Makan',
            'slug_en' => 'diningsets',
            'slug_id' => 'setmakan',
        ]);

        DB::table('sub_levels')->insert([
            'category_id' => 5,
            'subcategory_id' => 16,
            'name_en' => 'TV Units',
            'name_id' => 'Unit TV',
            'slug_en' => 'tvunits',
            'slug_id' => 'unittv',
        ]);
    }
}
