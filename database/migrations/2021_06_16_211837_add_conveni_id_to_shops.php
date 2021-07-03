<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddConveniIdToShops extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('shops', function (Blueprint $table) {
            DB::statement('DELETE FROM shops');
            $table->unsignedBigInteger('conveni_id')->after('remember_token');
            $table->unsignedBigInteger('prefecture_id')->after('conveni_id');
            $table->foreign('conveni_id')->references('id')->on('convenis');
            $table->foreign('prefecture_id')->references('id')->on('prefectures');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('shops', function (Blueprint $table) {
            $table->dropForeign(['conveni_id']);
            $table->dropForeign(['prefecture_id']);
        });
    }
}
