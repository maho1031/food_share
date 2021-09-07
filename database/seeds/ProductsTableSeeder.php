<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
            'name' => 'ケーキ',
            'category_id' => 5,
            'price' => '200',
            'exp_date' => '2021/06/07',
            'comment' => '美味しいケーキです。',
            'pic1' => 'pro1.jpg',
            'shop_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),


            ],

            [
                'name' => 'ケーキ',
                'category_id' => 5,
                'price' => '200',
                'exp_date' => '2021/06/07',
                'comment' => '美味しいケーキです。',
                'pic1' => 'pro2.jpg',
                'shop_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
    
    
                ],

                [
                    'name' => 'ケーキ',
                    'category_id' => 5,
                    'price' => '200',
                    'exp_date' => '2021/06/07',
                    'comment' => '美味しいケーキです。',
                    'pic1' => 'pro3.jpg',
                    'shop_id' => 1,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
        
        
                    ],
        ]);
    }
}
