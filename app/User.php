<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Expence;
use App\Category;

class User extends Authenticatable
{
  use Notifiable;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'name', 'email', 'password',
    ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
    'password', 'remember_token',
    ];

  // Expenceへのリレーション(User:Expence = 一:多)
  // 特定ユーザーの全Expenceを取得
  public function expences() {
    /*
    hasManyはIlluminate\Database\Eloquent\Relations\Relationクラスを継承した
    Illuminate\Database\Eloquent\Relations\HasManyクラスを返す。
    Relationクラスは自クラスとMacroableに呼び出されたメソッドが存在しない場合
    Illuminate\Database\Eloquent\Builderクラスのメソッドを呼び出す(Relation::__call)
    Builderクラスは自クラスとMacroableに呼び出されたメソッドが存在しない場合
    Illuminate\Database\Query\Builderクラスのメソッドを呼び出す(Builder::__call)
    のでHasManyオブジェクトはIlluminate\Database\Query\Builderのメソッドを利用することができる。
    */
    return $this->hasMany(Expence::class);
  }

  // Categoryへのリレーション(User:Category = 1:多)
  public function categories() {
    return $this->hasMany(Category::class);
  }
}
