<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
  /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->string('title');
          $table->longText('description');
          $table->longText('user_name');
          $table->integer('top10_id');
          $table->integer('user_id')->unsigned();
          $table->integer('votes')->default(0);
          $table->boolean('created-by-admin')->default(true);
          $table->timestamps();
          // $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::table('items', function($table) {
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
        Schema::dropIfExists('items');
    }
}
