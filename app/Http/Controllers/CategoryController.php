<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// ファサード
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

// モデル
use App\Category;

class CategoryController extends Controller {
  public function __construct() {
      $this->middleware('auth');
  }

  // 一覧画面
  public function index() {
    // 認証済みユーザーの取得(Illuminate\Support\Facades\Auth)
    // $id = Auth::id(); でも取得できる
    $user = Auth::user();
    $id = $user->id;
    $categories = Category::where('user_id', '=', $id)->get();
    $data = ['categories' => $categories];
    return view('category.index', $data);
  }

  // 作成画面
  public function create() {
    return view('category.create'); 
  }

  // 作成
  public function store(Request $request) {
    // バリデート
    // https://readouble.com/laravel/5.5/ja/validation.html#manually-creating-validators
    // $request->request->all() : POSTパラメータを配列で取得する
    $validator = Validator::make($request->all(), [
      'name'   => 'required|max:255',
      'budget' => 'required|integer'
    ]);
    if ($validator->fails()) {
      return redirect('/category/create')
        ->withInput()             // 入力内容をフラッシュデータに保存。(viewでold('category')のように呼び出す)
        ->withErrors($validator); // バリデーション失敗時のエラーメッセージをセッションのフラッシュデータとして保存
    }
    // 認証済みユーザーを取得
    // https://readouble.com/laravel/5.5/ja/authentication.html
    $user = Auth::user();
    // Insert
    // https://readouble.com/laravel/5.5/ja/eloquent.html
    $category = new Category();
    $category->user_id = $user->id;
    $category->fill($request->all());
    $category->save();
    return redirect("/category");
  }

  public function show(Request $request, Category $category) {
    $this->authorize('destroy', $category);
    return view('category.show', ['category' => $category]);
  }

  public function edit(Request $request, Category $category) {
    $this->authorize('destroy', $category);
    $data = ['category' => $category];
    return view('category.edit', $data);
  }

  public function update(Request $request, Category $category) {
    $this->authorize('destroy', $category);
    $this->validate($request, [
      'name'   => 'required|max:255',
      'budget' => 'required|integer'
    ]);
    $category->fill($request->all())->save();
    return redirect("/category");
  }

  public function destroy(Request $request, Category $category) {
    $this->authorize('destroy', $category);
    $category->delete();
    return redirect("/category");
  }
}
