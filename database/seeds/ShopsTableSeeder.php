<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ShopsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('shops')->insert([

            [
                'name' => '万代店',
                'email' => 'shop@test.com',
                'password' => Hash::make('password'),
                'address' => '新潟市中央区万代-1',
                'conveni_id' => 1,
                'prefecture_id' => 15,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'name' => '古町店',
                'email' => 'shop2@test.com',
                'password' => Hash::make('password'),
                'address' => '新潟市中央区古町1-1',
                'conveni_id' => 2,
                'prefecture_id' => 15,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'name' => '笹口店',
                'email' => 'shop3@test.com',
                'password' => Hash::make('password'),
                'address' => '新潟市中央区笹口1-1',
                'conveni_id' => 3,
                'prefecture_id' => 15,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'name' => '天神店',
                'email' => 'shop4@test.com',
                'password' => Hash::make('password'),
                'address' => '新潟市中央区天神尾1-1',
                'conveni_id' => 4,
                'prefecture_id' => 15,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'name' => '鳥屋野店',
                'email' => 'shop5@test.com',
                'password' => Hash::make('password'),
                'address' => '新潟市中央区鳥屋野1-1',
                'conveni_id' => 5,
                'prefecture_id' => 15,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => '新宿店',
                'email' => 'shop6@test.com',
                'password' => Hash::make('password'),
                'address' => '新宿区1-1',
                'conveni_id' => 1,
                'prefecture_id' => 13,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'name' => '原宿店',
                'email' => 'shop7@test.com',
                'password' => Hash::make('password'),
                'address' => '渋谷区神宮前111',
                'conveni_id' => 1,
                'prefecture_id' => 13,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

        ]);
    }
}
