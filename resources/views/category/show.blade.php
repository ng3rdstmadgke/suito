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
            <th scope="row">Name</th>
            <td>{{$category->name}}</td>
          </tr>
          <tr>
            <th scope="row">Budget</th>
            <td>{{$category->budget}}</td>
          </tr>
        <tbody>
        </tbody>
      </table>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-sm-1">
        <a class="btn btn-primary btn-sm" href="/category/{{substr($category->date, 0, 7)}}"><i class="fa fa-angle-double-left"></i> <span>戻る</span></a>
      </div>
      <div class="col-sm-1">
        <a class="btn btn-warning btn-sm" href="/category/{{$category->id}}/edit"><i class="fa fa-pencil"></i> <span>編集</span></a>
      </div>
      <div class="col-sm-1">
        <form action="{{ url('category/'.$category->id.'/destroy') }}" method="POST">
          {{ csrf_field() }}
          <!-- フォームをDELETEリクエストに見せかけるための隠しフォームを生成する -->
          <!-- <input type="hidden" name="_method" value="DELETE"> -->
          {{ method_field('DELETE') }}
          <button type="submit" id="delete-category-{{ $category->id }}" class="btn btn-danger btn-sm delete-category">
            <i class="fa fa-btn fa-trash"></i> <span>削除</span>
          </button>
        </form>
      </div>
    </div>
  </div>
<script>
document.addEventListener("DOMContentLoaded", function() {
  var btns = document.getElementsByClassName("delete-category");
  for (btn of btns) {
    btn.addEventListener("click", function(e) {
      if (!window.confirm("本当に削除しますか?")) {
        e.preventDefault();
      }
    }, false);
  }
}, false);
</script>
@endsection
