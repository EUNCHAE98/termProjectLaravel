<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMarketSlimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('market_slimes', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('board_id')->unsigned()->comment('게시판 번호');
            $table->foreign('board_id')->references('num')->on('boards')->onDelete('cascade')->onUpdate('cascade');

            $table->string('s_name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('market_slimes');
    }
}
