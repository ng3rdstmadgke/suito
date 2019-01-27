@extends('layouts.app')

@section('content')
  <!--  -->
  <div class="panel panel-default">
    <div class="panel-heading">アクション</div>
    <div class="panel-body">
      <div class="col-sm-6">
        <a class="btn btn-success" href="/category/create"><i class="fa fa-plus"></i> <span>新規作成</span></a>
      </div>
    </div>
  </div>
  @if (count($categories) > 0)
    <div class="panel panel-default">
      <div class="panel-heading">Category</div>

      <div class="panel-body">
        <table class="table table-hover table-bordered">
          <!-- テーブルヘッダ -->
          <thead class="row">
            <th class="col-sm-4">カテゴリ</th>
            <th class="col-sm-4">予算</th>
            <th class="col-sm-4">&nbsp;</th>
          </thead>
          <!-- テーブル本体 -->
          <tbody>
            @foreach ($categories as $category)
              <tr>
                <td class="table-text"><div>{{ $category->name }}</div></td>
                <td class="table-text"><div>{{ $category->budget }}</div></td>
                <td class="row">
                  <div class="col-sm-4">
                    <a class="btn btn-info btn-sm" id="show-category-{{ $category->id }}" href="{{url('/category/'.$category->id.'/show')}}"><i class="fa fa-file-text-o"></i> <span>詳細</span></a>
                  </div>
                  <div class="col-sm-4">
                    <a class="btn btn-warning btn-sm" href="/category/{{$category->id}}/edit"><i class="fa fa-pencil"></i> <span>編集</span></a>
                  </div>
                  <div class="col-sm-4">
                    <form action="{{ url('category/'.$category->id.'/destroy') }}" method="POST">
                      {{ csrf_field() }}
                      <!-- フォームをDELETEリクエストに見せかけるための隠しフォームを生成する -->
                      <!-- <input type="hidden" name="_method" value="DELETE"> -->
                      {{ method_field('DELETE') }}
                      <button type="submit" id="delete-category-{{ $category->id }}" class="btn btn-danger btn-sm delete-category">
                        <i class="fa fa-trash"></i> <span>削除<span>
                      </button>
                    </form>
                  </div>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  @endif
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
