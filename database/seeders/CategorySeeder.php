<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $name_en = ['Appliances', 'Beauty', 'Electronics', 'Fashion', 'Sweet Home'];
        $name_id = ['Peralatan', 'Kecantikan', 'Elektronik', 'Gaya', 'Rumah'];
        $icon = ['fa fa-shopping-bag', 'fa fa-heartbeat', 'fa fa-user', 'fa fa-diamond', 'fa fa-shopping-cart'];

        for ($i = 0; $i < count($name_en); $i++) {
            $category = new Category;
            $category->name_en = $name_en[$i];
            $category->name_id = $name_id[$i];
            $category->slug_en = strtolower($name_en[$i]);
            $category->slug_id = strtolower($name_id[$i]);
            $category->icon = $icon[$i];
            $category->save();
        }
    }
}
