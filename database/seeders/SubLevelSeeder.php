<?php

namespace Database\Seeders;

use App\Models\SubLevel;
use Illuminate\Database\Seeder;

class SubLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $name_en = [
            'Double Door', 'Mini Rerigerators', 'Single Door', 'Big Screen TV', 'Smart TV', 'LED TV',
            'Energy Efficient', 'Washer', 'Washer and Dryers', 'Eye Makeup', 'Hair Care', 'Baby Diapers', 'Baby Food',
            'Baby Wipes', 'Beverages', 'Chocolates', 'Snacks', 'Lip Makeup', 'Monitors', 'Printers', 'Projectors',
            'Gaming Keyboars', 'Gaming Mouse', 'Gamepads', 'Designer Cases', 'Plain Cases', 'Screen Guards', 'Men Cargos',
            'Men Jeans', 'Men Trousers', 'Men Casual Shoes', 'Men Formal Shoes', 'Men Sports Shoes', 'Men Casual Shirts',
            'Men Kurtas', 'Men Tshirt', 'Women Flats Shoes', 'Women Heels', 'Woman Sheakers', 'Clocks',
            'Lightings', 'Wall Decor', 'Blankets', 'Bed Liners', 'Bedsheets', 'Coffee Tables', 'Dining Sets', 'TV Units'
        ];

        $name_id = [
            'Pintu Ganda', 'Kulkas Mini', 'Pintu Tunggal', 'TV Layar Besar', 'TV Pintar', 'TV LED',
            'Hemat Energi', 'Pencuci', 'Pencuci dan Pengering', 'Riasan Mata', 'Perawatan Rambut', 'Popok Bayi', 'Makanan Bayi',
            'Tisu Bayi', 'Minuman', 'Cokelat', 'Camilan', 'Riasan Bibir', 'Monitor', 'Printer', 'Proyektor',
            'Keyboard Game', 'Mouse Gaming', 'Gamepads', 'Kasing Desainer', 'Kasus Biasa', 'Pengawal Layar', 'Kargo Pria',
            'Men Jeans', 'Celana Panjang Pria', 'Sepatu Kasual Pria', 'Sepatu Formal Pria', 'Sepatu Olahraga Pria', 'Kemeja Kasual Pria',
            'Kurtas Pria', 'Kaos Pria', 'Sepatu Flat Wanita', 'Heels Wanita', 'Sheaker Wanita', 'Jam',
            'Pencahayaan', 'Dekorasi Dinding', 'Selimut', 'Selimut Tempat Tidur', 'Seprei', 'Meja Kopi', 'Set Makan', 'Unit TV'
        ];

        $category_id = [
            1, 1, 1, 1, 1, 1, 1, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 3, 3, 3, 3, 3, 3,
            3, 3, 3, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5
        ];

        $subcategory_id = [
            1, 1, 1, 2, 2, 2, 3, 3, 3, 4, 4, 4, 5, 5, 5, 6, 6, 6, 7, 7, 7, 8, 8, 8, 9, 9, 9,
            10, 10, 10, 11, 11, 11, 12, 12, 12, 13, 13, 13, 14, 14, 14, 15, 15, 15, 16, 16, 16
        ];

        for ($i = 0; $i < count($name_en); $i++) {
            $sublevel = new SubLevel;
            $sublevel->category_id = $category_id[$i];
            $sublevel->subcategory_id = $subcategory_id[$i];
            $sublevel->name_en = $name_en[$i];
            $sublevel->name_id = $name_id[$i];
            $sublevel->slug_en = strtolower($name_en[$i]);
            $sublevel->slug_id = strtolower($name_id[$i]);
            $sublevel->save();
        }
    }
}
