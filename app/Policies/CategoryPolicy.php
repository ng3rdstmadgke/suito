<?php

namespace App\Policies;

// モデル
use App\User;
use App\Category;

use Illuminate\Auth\Access\HandlesAuthorization;

class CategoryPolicy {
  use HandlesAuthorization;

  /**
   * Create a new policy instance.
   *
   * @return void
   */
  public function __construct() {
    //
  }

  /**
   * 指定されたユーザーが指定されたexpenceを削除できるか決定
   *
   * @param  User     $user
   * @param  Category $category
   * @return bool
   */
  public function destroy(User $user, Category $category) {
    return $user->id === $category->user_id;
  }
}
