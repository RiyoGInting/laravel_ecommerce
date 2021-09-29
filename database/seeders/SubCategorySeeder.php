<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\SubCategory;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $name_en = [
            'Refrigerators', 'Televisions', 'Washing Machines', 'Beauty and Personal Care',
            'Baby Care', 'Food and Drinks', 'Computer Peripherals', 'Gaming', 'Mobile Accessory',
            'Men Bottom Ware', 'Men Footwear', 'Men Top Ware', 'Women Footwear', 'Home Decor',
            'Home Furnishings', 'Living Room'
        ];

        $name_id = [
            'Kulkas', 'Televisi', 'Mesin Cuci', 'Kecantikan dan Perawatan Pribadi', 'Perawatan Bayi',
            'Makanan dan Minuman', 'Perlengkapan Komputer', 'Permainan', 'Aksesori Seluler',
            'Pakaian Bawahan Pria', 'Alas Kaki Pria',  'Perlengkapan Atasan Pria', 'Alas Kaki Wanita',
            'Dekorasi Rumah',  'Perabotan Rumah', 'Ruang Tamu',
        ];

        $category_id = [1, 1, 1, 2, 2, 2, 3, 3, 3, 4, 4, 4, 4, 5, 5, 5];

        for ($i = 0; $i < count($name_en); $i++) {
            $subcategory = new SubCategory;
            $subcategory->category_id = $category_id[$i];
            $subcategory->name_en = $name_en[$i];
            $subcategory->name_id = $name_id[$i];
            $subcategory->slug_en = strtolower($name_en[$i]);
            $subcategory->slug_id = strtolower($name_id[$i]);
            $subcategory->save();
        }
    }
}
