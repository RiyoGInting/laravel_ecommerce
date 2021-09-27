<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Admin::factory()->create();
        \App\Models\User::factory(10)->create();

        $this->call([
            BrandSeeder::class,
            CategorySeeder::class,
            SubCategorySeeder::class,
            SubLevelSeeder::class,
            SliderSeeder::class,
            ProductSeeder::class,
            MultiImageSeeder::class,
        ]);
    }
}
