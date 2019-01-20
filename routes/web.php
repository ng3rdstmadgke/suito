<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
*** ルートの命名規則 ***
機能名    Controllerメソッド名 HTTPメソッド パス                        ルート名
一覧画面  index                GET          /リソース名                 resource.index
作成画面  create               GET          /リソース名/create          resource.create
作成      store                POST         /リソース名                 resource.store
詳細画面  show                 GET          /リソース名/{resource}      resource.show
編集画面  edit                 GET          /リソース名/{resource}/edit resource.edit
編集      update               PUT/PATCH    /リソース名/{resource}      resource.update
削除      destroy              DELETE       /リソース名/{resource}      resource.destroy
*/

Route::get('/', function () { return redirect("/expences"); });

// 認証画面
Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();

// ルート定義はIlluminate\Routing\Router::getでRouterオブジェクトになり
// (インターフェースはIlluminate\Contracts\Routing\Registrar)
// Illuminate\Routing\RouteCollectionに登録される
// ※Routeがどこから来ているのかはわからない
Route::get('/expences/{month?}'            , 'ExpencesController@index')->where('month', '20\d{2}-\d{2}');  // 一覧画面(monthは任意指定)
Route::get('/expences/create'              , 'ExpencesController@create'); // 作成画面
Route::post('/expences/store'              , 'ExpencesController@store');  // 作成
Route::get('/expences/{expence}/show'      , 'ExpencesController@show');   // 詳細画面
Route::get('/expences/{expence}/edit'      , 'ExpencesController@edit');   // 編集画面
Route::post('/expences/{expence}/update'    , 'ExpencesController@update'); // 編集
Route::delete('/expences/{expence}/destroy', 'ExpencesController@destroy');// 削除
