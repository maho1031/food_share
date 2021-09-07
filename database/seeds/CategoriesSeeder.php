<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
              'name' => 'お弁当',
              'created_at' => Carbon::now(),
              'updated_at' => Carbon::now(),
            ],
            [
              'name' => 'おにぎり',
              'created_at' => Carbon::now(),
              'updated_at' => Carbon::now(),
            ],
            [
              'name' => 'サンドイッチ',
              'created_at' => Carbon::now(),
              'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'パン',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
              ],
            [
                'name' => 'スイーツ',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
              ],
              [
                'name' => 'お菓子',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
              ],
              [
                'name' => '飲み物',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
              ],
          ]);
    }
}
