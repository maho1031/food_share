<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddShopIdToProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            //既存のレコードを削除する
          DB::statement('DELETE FROM products');
          $table->unsignedBigInteger('shop_id')->after('delete_flg');
          $table->unsignedBigInteger('buyer_id')->nullable()->after('shop_id');
          $table->foreign('shop_id')->references('id')->on('shops');
          $table->foreign('buyer_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign(['shop_id']);
            $table->dropForeign(['buyer_id']);
        });
    }
}
