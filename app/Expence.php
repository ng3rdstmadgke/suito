<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Expence extends Model
{
  // 複数代入を許可するプロパティーを明示する
  // 複数代入(http://laravel4.winroad.jp/faq/%E8%A4%87%E6%95%B0%E4%BB%A3%E5%85%A5%E3%81%A8%E3%81%AF/)
  protected $fillable = ['date', 'name', 'category', 'price'];
  // 対応するテーブルを明示する場合
  protected $table = "expences";

  // Userへのリレーション(User:Expence = 一:多)
  // Expenceが属するユーザーを取得
  public function user() {
    return $this->belongsTo(User::class);
  }

  public function category() {
    return $this->belongsTo(Category::class);
  }
}
