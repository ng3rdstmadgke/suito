<?php

namespace App\Http\Controllers;

// ログ出力用(ログはstorage/logs/laravel.logに出力される)
// ob_start();
// var_dump();
// $a = ob_get_contents();
// ob_end_clean();
// Log::debug($a);
use Illuminate\Support\Facades\Log;
use App\Repositories\ExpencesRepository;
use App\Expence;
use Validator;
use Illuminate\Http\Request;

class ExpencesController extends Controller {
  // Expencesリポジトリのインスタンス
  protected $expences;

  public function __construct(ExpencesRepository $expences) {
    // このコントローラを利用するには認証済みユーザーである必要がある
    // 利用可能なミドルウェアはapp/Http/Kernel.phpに定義されている
    $this->middleware('auth');
    $this->expences = $expences;
  }

  // 一覧画面
  public function index(Request $request, $month = null) {
    if (is_null($month)) {
      // GETパラメータの取得
      $month = $request->month ?? date('Y-m');
      return redirect("/expences/{$month}");
    }
    $data = [
              'month'    => $month,
              'expences' => $this->expences->userExpences($request->user(), $month),
            ];
    return view('expences.index', $data);
  }


  // 作成画面
  public function create(Request $request) {
    return view('expences.create');
  }

  // 作成
  public function store(Request $request) {
    $this->validate($request, [
      'date'     => 'required|date',
      'name'     => 'max:255',
      'category' => 'required|max:255',
      'price'    => 'required|integer'
    ]);
    /*
    // バリデータを作成してから行っても良い
    // $request->request->all() でPOSTパラメータを配列で取得する
    // https://readouble.com/laravel/5.5/ja/validation.html#manually-creating-validators
    $validator = Validator::make($request->all(), [
      'date'     => 'required|date',
      'name'     => 'max:255',
      'category' => 'required|max:255',
      'price'    => 'required|integer'
    ]);
    if ($validator->fails()) {
      return redirect('/expences/create')
        ->withInput()             // 入力内容をフラッシュデータに保存。(viewでold('category')のように呼び出す)
        ->withErrors($validator); // バリデーション失敗時のエラーメッセージをセッションのフラッシュデータとして保存
    }
    */
    $request->user()->expences()->create([
        'date'     => $request->date,
        'name'     => $request->name,
        'category' => $request->category,
        'price'    => $request->price
    ]);

    return redirect('/expences/create');
  }

  public function show() {
  }
  public function edit() {
  }
  public function update() {
  }

  // 削除
  public function destroy(Request $requests, Expence $expence) {
    // ルートの{expence}がコントローラメソッドの$task変数定義と一致するとき
    // {expence}に対応するIDを持つ、モデルインスタンスを自動的に依存注入する。
    // モデルインスタンスがDB上に見つからない場合は404 HTTPレスポンスが自動的に生成される。
    // https://readouble.com/laravel/5.2/ja/routing.html#route-model-binding

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
