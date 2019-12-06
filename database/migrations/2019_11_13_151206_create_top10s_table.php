<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTop10sTable extends Migration
{
  /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('top10s', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->string('title');
          $table->longText('description');
          // $table->dateTime('created_time')->default(0);
          $table->integer('user_id')->unsigned();
          $table->boolean('created-by-admin')->default(true);
          $table->timestamps();
      });

      Schema::table('top10s', function($table) {
          $table->foreign('user_id')->references('id')->on('users');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('top10s');
    }
}
