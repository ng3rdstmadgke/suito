<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// リポジトリ
use App\Repositories\ExpencesRepository;
use App\Repositories\CategoriesRepository;
// ファサード
// ログ出力(ログはstorage/logs/laravel.logに出力される)
// Log::debug(print_r($request->all(), true));
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
// モデル
use App\Expence;
use App\Category;

class ExpencesController extends Controller {
  /**
   * @var ExpencesRepository
   */
  protected $expences;
  /**
   * @var CategoriesRepository
   */
  protected $categories;

  public function __construct(ExpencesRepository $expences, CategoriesRepository $categories) {
    // このコントローラを利用するには認証済みユーザーである必要がある
    // 利用可能なミドルウェアはapp/Http/Kernel.phpに定義されている
    $this->middleware('auth');
    $this->expences = $expences;
    $this->categories = $categories;
  }

  // 一覧画面
  public function index(Request $request, $month = null) {
    if (is_null($month)) {
      // GETパラメータの取得
      $month = $request->month ?? date('Y-m');
      return redirect("/expences/{$month}");
    }
    $id = Auth::id();
    $data = [
      'month'      => $month,
      // リレーションを設定しているのでexpenceモデルのインスタンスには
      // 対応するcategoryモデルのインスタンスが含まれている。($expence->category->name)
      'expences'   => $this->expences->userExpences($request->user(), $month),
    ];
    return view('expences.index', $data);
  }


  // 作成画面
  public function create(Request $request) {
    $data = [
      'categories' => $this->categories->userCategories($request->user())
    ];
    return view('expences.create', $data);
  }

  // 作成
  public function store(Request $request) {
    // vendor/laravel/framework/src/Illuminate/Foundation/Validation/ValidatesRequests.php
    $this->validate($request, [
      'date'        => 'required|date',
      'category_id' => 'required|integer',
      'name'        => 'max:255',
      'price'       => 'required|integer'
    ]);
    // TODO: ポリシーによるカテゴリの認証を行う必要あり
    $request->user()->expences()->create([
        'date'        => $request->date,
        'category_id' => $request->category_id,
        'name'        => $request->name,
        'price'       => $request->price
    ]);

    $month = date('Y-m', strtotime($request->date));
    return redirect("/expences/{$month}");
  }

  // 詳細画面
  public function show(Request $request, Expence $expence) {
    $this->authorize('destroy', $expence);
    return view('expences.show', ['expence' => $expence]);
  }

  public function edit(Request $request, Expence $expence) {
    $this->authorize('destroy', $expence);
    $data = [
      'expence'    => $expence,
      'categories' => $this->categories->userCategories($request->user())
    ];
    return view('expences.edit', $data);
  }
  public function update(Request $request, Expence $expence) {
    $this->authorize('destroy', $expence);
    $this->validate($request, [
      'date'        => 'required|date',
      'category_id' => 'required|integer',
      'name'        => 'max:255',
      'price'       => 'required|integer'
    ]);
    $post = $request->all();
    $expence->fill($request->all())->save();
    $month = date('Y-m', strtotime($post['date']));
    return redirect("/expences/{$month}");
  }

  // 削除
  public function destroy(Request $requests, Expence $expence) {
    // ルートの{expence}がコントローラメソッドの引数名と一致するとき
    // タイプヒントされたEloquentモデルで自動的に依存解決する
    // モデルインスタンスがDB上に見つからない場合は404 HTTPレスポンスが自動的に生成される。
    // https://readouble.com/laravel/5.5/ja/routing.html#route-model-binding

    // ポリシー https://readouble.com/laravel/5.5/ja/authorization.html 
    // 認証済みユーザが$expenceインスタンスを所有していることを確認するためにポリシー機能による認可を行う
    // Illuminate\Foundation\Auth\Access\AuthorizesRequestsトレイトのauthorizeメソッドを呼び出し
    // ポリシーによる認可を行う(App\Policies\ExpencePolicy)
    // アクションが許可されない場合は403 HTTPレスポンスが自動的に生成される。
    // 第一引数は呼び出したいポリシーメソッドの名前
    // 第二引数はモデルのインスタンス
    $this->authorize('destroy', $expence);
    // 月の取得
    $month = date('Y-m', strtotime($expence->date));
    // 削除
    $expence->delete();
    return redirect("/expences/{$month}");
  }
}
