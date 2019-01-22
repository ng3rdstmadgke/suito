<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * expencesテーブルにstringのcategoryカラムを削除する
 */
class ExpencesDropCategoryAddCategoryId extends Migration {
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    Schema::table('expences', function (Blueprint $table) {
      $table->dropColumn('category');
      $table->integer('category_id')->unsigned()->after('name');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    Schema::table('expences', function (Blueprint $table) {
      $table->dropColumn('category_id');
      $table->string('category')->after('name');
    });
  }
}
