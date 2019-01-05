<?php

namespace App\Repositories;

use App\User;

class ExpencesRepository {
  /**
   * ある期間のユーザーの出費記録を取得する
   *
   * @param User $user
   * @param string $start 開始
   * @param string $last  終了
   * @return \Illuminate\Support\Collection
   */
  public function userExpences(User $user, string $month) {
    $start = date('Y-m-01 00:00:00', strtotime($month));
    $last  = date('Y-m-d 23:59:59', (strtotime($start.' +1 month') - 1));
    return $user->expences()
                ->whereBetween('date', [$start, $last])
                ->orderBy('date', 'asc')
                ->get();
  }
}
