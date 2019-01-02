<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // cho phep tao khoa ngoai
        Schema::enableForeignKeyConstraints();

        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->text('questions');
            $table->integer('id_post')->unsigned();
            $table->timestamps();

            // tao lien ket toi bang posts
            $table->foreign('id_post')
                  ->references('id')
                  ->on('posts')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        // xoa khoa ngoai
        Schema::create('comments', function (Blueprint $table) {
            $table->dropForeign(['id_post']);
        });
        Schema::dropIfExists('comments');
    }
}
