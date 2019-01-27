<?php

namespace App\Policies;

// モデル
use App\User;
use App\Category;
use App\Expence;

use Illuminate\Auth\Access\HandlesAuthorization;

class ExpencePolicy {
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
   * @param  User  $user
   * @param  Expence  $expence
   * @return bool
   */
  public function destroy(User $user, Expence $expence) {
    // https://readouble.com/laravel/5.5/ja/authorization.html#creating-policies
    return $user->id === $expence->user_id;
  }


  /**
   * 指定されたcategory_idがユーザーのものかどうかを判定する
   *
   * @param  User     $user
   * @param  Expence  $expence
   * @return bool
   */
  public function store(User $user, Expence $expence) {
    $categories = Category::where([
      ['user_id', '=', $user->id], 
      ['id'     , '=', $expence->category_id]
    ])->get();
    return !$categories->isEmpty();
  }
}
