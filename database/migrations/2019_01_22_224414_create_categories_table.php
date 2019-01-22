<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * categoriesテーブルを作成する
 */
class CreateCategoriesTable extends Migration {
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    Schema::create('categories', function (Blueprint $table): void {
      $table->increments('id');
      $table->integer('user_id')->unsigned();
      $table->string('name');
      $table->integer('budget')->unsigned();
      // ソフトデリートのためのカラム
      // https://readouble.com/laravel/5.5/ja/eloquent.html
      // timestamp型。データがnull出ない場合は削除されたものとみなす。
      // $table->softDeletes();
      $table->index('user_id');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    Schema::dropIfExists('categories');
  }
}
