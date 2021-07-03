<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            'name' => '中目黒店',
            'email' => 'shop@test.com',
            'password' => bcrypt('password'),
            'address' => '中目黒1-1',
            'conveni_id' => 1,
            'prefecture_id' => 13,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
