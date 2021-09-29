<?php

namespace Database\Seeders;

use App\Models\Product;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker_en = Faker::create('en_US');
        $faker_id = Faker::create('id_ID');
        $tags_en = ['appliances', 'beauty', 'electronics', 'fashion', 'sweethome'];
        $tags_id = ['peralatan', 'kecantikan', 'elektronik', 'gaya', 'rumah'];

        for ($i = 0; $i < 200; $i++) {
            $number = rand(1, 4);
            $price = rand(500, 1500);
            $name_en = $faker_en->word;
            $name_id = $faker_id->word;

            $product = new Product;
            $product->brand_id = rand(1, 6);
            $product->category_id = rand(1, 5);
            $product->subcategory_id = rand(1, 16);
            $product->sublevel_id = rand(1, 48);

            $product->name_en = $name_en;
            $product->name_id = $name_id;
            $product->slug_en = strtolower($name_en);
            $product->slug_id = strtolower($name_id);
            $product->code = $faker_en->ean8;

            $product->quantity = rand(100, 500);
            $product->tags_en = $tags_en[rand(0, 4)];
            $product->tags_id = $tags_id[rand(0, 4)];
            $product->size_en = 'Small,Medium,Large';
            $product->size_id = 'Kecil,Sedang,Besar';

            $product->color_en = $faker_en->colorName;
            $product->color_id = $faker_id->colorName;
            $product->price = $price;
            $product->short_description_en = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In a fringilla odio, in aliquam erat. Ut pellentesque odio neque, posuere consequat velit accumsan in. Maecenas ac felis eget mauris pellentesque malesuada ac sed nisi. Morbi hendrerit ex eu diam sodales, vel tempor lorem elementum. Duis elementum vulputate ultricies.';
            $product->short_description_id = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In a fringilla odio, in aliquam erat. Ut pellentesque odio neque, posuere consequat velit accumsan in. Maecenas ac felis eget mauris pellentesque malesuada ac sed nisi. Morbi hendrerit ex eu diam sodales, vel tempor lorem elementum. Duis elementum vulputate ultricies.';

            $product->long_description_en = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In a fringilla odio, in aliquam erat. Ut pellentesque odio neque, posuere consequat velit accumsan in. Maecenas ac felis eget mauris pellentesque malesuada ac sed nisi. Morbi hendrerit ex eu diam sodales, vel tempor lorem elementum. Duis elementum vulputate ultricies. Aenean condimentum sed elit non auctor. Phasellus tincidunt faucibus eros. Donec eu sem et purus iaculis volutpat. In tincidunt, felis nec finibus pharetra, metus odio malesuada orci, eget sagittis felis orci vel odio. Suspendisse facilisis ligula vel varius fringilla.';
            $product->long_description_id = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In a fringilla odio, in aliquam erat. Ut pellentesque odio neque, posuere consequat velit accumsan in. Maecenas ac felis eget mauris pellentesque malesuada ac sed nisi. Morbi hendrerit ex eu diam sodales, vel tempor lorem elementum. Duis elementum vulputate ultricies. Aenean condimentum sed elit non auctor. Phasellus tincidunt faucibus eros. Donec eu sem et purus iaculis volutpat. In tincidunt, felis nec finibus pharetra, metus odio malesuada orci, eget sagittis felis orci vel odio. Suspendisse facilisis ligula vel varius fringilla.';
            $product->thumbnail = 'upload/product/thumbnail/p' . rand(1, 47) . '.jpeg';
            $product->status = 1;

            if ($number == 1) {
                $discount = rand(50, 450);
                $percentage = $discount / $price * 100;
                $product->discount = $discount;
                $product->discount_percentage = round($percentage, 2);
                $product->hot_deals = 1;
            } else if ($number == 2) {
                $product->featured = 1;
            } else if ($number == 3) {
                $product->special_offer = 1;
            } else if ($number == 4) {
                $product->special_deals = 1;
            }

            $product->save();
        }
    }
}
