@extends('layouts.app')

@section('content')
  <!-- タスクフォームの作成… -->
  <div class="panel panel-default">
  <div class="panel-heading">
    抽出期間
  </div>
  <div class="panel-body">
    <form action="{{ url('/expences') }}" method="GET" class="form-horizontal">
      {{ csrf_field() }}
      <!-- タスク名 -->
      <div class="form-group">
        <label for="expence-month" class="col-sm-3 control-label">Month</label>
        <div class="col-sm-6">
          <input type="month" name="month" id="expence-month" class="form-control" value="{{$month}}" required>
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-3 col-sm-6">
          <button type="submit" class="btn btn-primary"><i class="fa fa-refresh"></i> <span>更新</span></button>
          <a class="btn btn-success" href="/expences/create"><i class="fa fa-plus"></i> <span>新規作成</span></a>
        </div>
      </div>
    </form>
  </div>
  </div>

  <!-- 現在のタスク -->
  @if (count($expences) > 0)
    <div class="panel panel-default">
      <div class="panel-heading">
        Expences
      </div>

      <div class="panel-body">
        <table class="table table-hover table-bordered">

          <!-- テーブルヘッダ -->
          <thead class="row">
            <th class="col-sm-1">日付</th>
            <th class="col-sm-2">カテゴリ</th>
            <th class="col-sm-2">名前</th>
            <th class="col-sm-1">金額</th>
            <th class="col-sm-3">&nbsp;</th>
          </thead>

          <!-- テーブル本体 -->
          <tbody>
            @foreach ($expences as $expence)
              <tr>
                <td class="table-text"><div>{{ substr($expence->date, 0, 10) }}</div></td>
                <td class="table-text"><div>{{ $expence->category }}</div></td>
                <td class="table-text"><div>{{ $expence->name }}</div></td>
                <td class="table-text"><div>{{ $expence->price }}</div></td>
                <td class="row">
                  <div class="col-sm-4">
                    <a class="btn btn-info btn-sm" id="show-expence-{{ $expence->id }}" href="{{url('/expences/'.$expence->id.'/show')}}"><i class="fa fa-file-text-o"></i> <span>詳細</span></a>
                  </div>
                  <div class="col-sm-4">
                    <a class="btn btn-warning btn-sm" href="/expences/{{$expence->id}}/edit"><i class="fa fa-pencil"></i> <span>編集</span></a>
                  </div>
                  <div class="col-sm-4">
                    <form action="{{ url('expences/'.$expence->id.'/destroy') }}" method="POST">
                      {{ csrf_field() }}
                      <!-- フォームをDELETEリクエストに見せかけるための隠しフォームを生成する -->
                      <!-- <input type="hidden" name="_method" value="DELETE"> -->
                      {{ method_field('DELETE') }}
                      <button type="submit" id="delete-expence-{{ $expence->id }}" class="btn btn-danger btn-sm delete-expence">
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
  var btns = document.getElementsByClassName("delete-expence");
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
