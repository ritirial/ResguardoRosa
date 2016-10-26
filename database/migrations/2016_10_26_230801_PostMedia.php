<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PostMedia extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('PostMedia', function (Blueprint $table) {
            $table->integer('postid')->unsigned();
            $table->foreign('postid')->references('id')->on('Posts')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('mediaid')->unsigned();
            $table->foreign('mediaid')->references('id')->on('Medias')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('PostMedia');
    }
}
