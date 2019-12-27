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
      Schema::create('comments', function (Blueprint $table) {
        $table->bigIncrements('id');
        $table->longText('content');
        $table->integer('user_id')->unsigned();
        $table->longText('user_name');
        $table->integer('item_id');
        $table->integer('list_id');
        $table->integer('likes')->default(0);
        $table->boolean('created-by-admin')->default(false);
        $table->timestamps();
      });

      Schema::table('comments', function($table) {
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
      Schema::dropIfExists('comments');
  }
}
