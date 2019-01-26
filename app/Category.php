<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model {
  /**
   * テーブル名
   * @var string
   */
  protected $table = 'categories';
  /**
   * 複数代入可能なカラム
   * @var array
   */
  protected $fillable = ['name', 'budget'];

  public function user() {
    return $this->belongsTo(User::class);
  }

  public function expences() {
    return $this->hasMany(Expence::class);
  }
}
