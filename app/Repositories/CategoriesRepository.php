<?php

namespace App\Repositories;

use App\User;

class CategoriesRepository {
  /**
   * ユーザーのカテゴリを取得する
   *
   * @param User $user
   * @return array
   */
  public function userCategories(User $user) {
    // Userモデルにリレーションを設定しているので
    // Userインスタンスは対応するcategoryを取得できる
    return $user->categories()->get();
  }
}
