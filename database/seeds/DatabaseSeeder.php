<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model; 

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        $this->call(ConvenisTableSeeder::class);
        $this->call(PrefecturesTableSeeder::class);
        $this->call(ShopsTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
    }
}
