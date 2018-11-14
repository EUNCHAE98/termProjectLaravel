<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateboardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boards', function (Blueprint $table) {
            $table->increments('num')->comment('게시글 번호');
            $table->string('title')->comment('게시글 제목');
            $table->string('writer')->comment('글쓴이');
            $table->text('content')->comment('게시글 내용');
            $table->integer('hits')->default(0)->comment('조회수');
            $table->string('category')->comment('게시글 종류');
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
        Schema::dropIfExists('boards');
    }
}
