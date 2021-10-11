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
                'name' => 'マカロン',
                'category_id' => 5,
                'price' => '500',
                'exp_date' => '2021/10/07',
                'comment' => '美味しいマカロンです。',
                'pic1' => 'pro2.jpg',
                'shop_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
    
    
                ],

                [
                    'name' => 'チーズケーキ',
                    'category_id' => 5,
                    'price' => '230',
                    'exp_date' => '2021/09/07',
                    'comment' => '美味しいチーズケーキです。',
                    'pic1' => 'pro3.jpg',
                    'shop_id' => 2,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
        
        
                    ],

                    [
                        'name' => 'グミ',
                        'category_id' => 6,
                        'price' => '120',
                        'exp_date' => '2021/09/25',
                        'comment' => '美味しいグミです。',
                        'pic1' => 'gumi.jpg',
                        'shop_id' => 3,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
            
            
                        ],


                    [
                        'name' => 'プリン',
                        'category_id' => 5,
                        'price' => '300',
                        'exp_date' => '2021/09/28',
                        'comment' => '美味しいプリンです。',
                        'pic1' => 'prin.jpg',
                        'shop_id' => 4,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
            
            
                        ],

                        [
                            'name' => 'コーヒー',
                            'category_id' => 7,
                            'price' => '300',
                            'exp_date' => '2021/09/17',
                            'comment' => '美味しいコーヒーです。',
                            'pic1' => 'cofee.jpg',
                            'shop_id' => 5,
                            'created_at' => Carbon::now(),
                            'updated_at' => Carbon::now(),
                
                
                            ],
        ]);
    }
}
