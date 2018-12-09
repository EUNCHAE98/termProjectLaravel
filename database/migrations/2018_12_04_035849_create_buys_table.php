<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBuysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buys', function (Blueprint $table) {


            $table->integer('board_id')->unsigned()->comment('게시판 번호');
            $table->foreign('board_id')->references('num')->on('boards')->onDelete('cascade')->onUpdate('cascade');

            $table->string('name', 100)->comment('구입자');
            $table->foreign('name')->references('name')->on('users')->onDelete('cascade')->onUpdate('cascade');

            $table->string('s_name')->comment('슬라임 이름');
            $table->string('message')->comment('주문 메세지');
            $table->timestamp('s_regtime')->comment('주문시각');
            $table->bigInteger('order_id')->comment('주문번호');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('buys');
    }
}
