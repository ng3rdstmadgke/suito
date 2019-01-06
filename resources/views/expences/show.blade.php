@extends('layouts.app')
@section('content')
  <div class="panel panel-default">
    <div class="panel-body">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">Key</th>
            <th scope="col">Value</th>
          </tr>
        </thead>
          <tr>
            <th scope="row">Date</th>
            <td>{{$expence->date}}</td>
          </tr>
          <tr>
            <th scope="row">Category</th>
            <td>{{$expence->category}}</td>
          </tr>
          <tr>
            <th scope="row">Name</th>
            <td>{{$expence->name}}</td>
          </tr>
          <tr>
            <th scope="row">Price</th>
            <td>{{$expence->price}}</td>
          </tr>
        <tbody>
        </tbody>
      </table>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-sm-1">
        <a class="btn btn-primary" href="/expences/{{substr($expence->date, 0, 7)}}">戻る</a>
      </div>
      <div class="col-sm-1">
        <a class="btn btn-warning" href="/expences/{{$expence->id}}/edit">編集</a>
      </div>
      <div class="col-sm-1">
        <form action="{{ url('expences/'.$expence->id.'/destroy') }}" method="POST">
          {{ csrf_field() }}
          <!-- フォームをDELETEリクエストに見せかけるための隠しフォームを生成する -->
          <!-- <input type="hidden" name="_method" value="DELETE"> -->
          {{ method_field('DELETE') }}
          <button type="submit" id="delete-expence-{{ $expence->id }}" class="btn btn-danger">
            <i class="fa fa-btn fa-trash"></i>削除
          </button>
        </form>
      </div>
    </div>
  </div>
@endsection
