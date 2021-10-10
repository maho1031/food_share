<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model; 
use App\Shop;
use App\Product;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        $this->call([
            CategoriesSeeder::class,
            ConvenisTableSeeder::class,
            PrefecturesTableSeeder::class,
            ShopsTableSeeder::class,
            ProductsTableSeeder::class,
            UsersTableSeeder::class,

        ]);

        // factory(App\Product::class, 50)->create();
    }
}
