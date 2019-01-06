@extends('layouts.app')

@section('content')
  <!-- タスクフォームの作成… -->
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
          <button type="submit" class="btn btn-default"><i class="fa fa-plus"></i>更新</button>
        </div>
      </div>
    </form>
  </div>

  <!-- 現在のタスク -->
  @if (count($expences) > 0)
    <div class="panel panel-default">
      <div class="panel-heading">
        Expences
      </div>

      <div class="panel-body">
        <table class="table table-striped expence-table">

          <!-- テーブルヘッダ -->
          <thead>
            <th>Date</th>
            <th>Name</th>
            <th>Category</th>
            <th>Price</th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
          </thead>

          <!-- テーブル本体 -->
          <tbody>
            @foreach ($expences as $expence)
              <tr>
                <td class="table-text">
                  <div>{{ $expence->date }}</div>
                </td>
                <td class="table-text">
                  <div>{{ $expence->name }}</div>
                </td>
                <td class="table-text">
                  <div>{{ $expence->category }}</div>
                </td>
                <td class="table-text">
                  <div>{{ $expence->price }}</div>
                </td>
                <td>
                  <div>
                    <a class="btn btn-info" id="show-expence-{{ $expence->id }}" href="{{url('/expences/'.$expence->id.'/show')}}">詳細</a>
                  </div>
                </td>
                <td>
                  <form action="{{ url('expences/'.$expence->id.'/destroy') }}" method="POST">
                    {{ csrf_field() }}
                    <!-- フォームをDELETEリクエストに見せかけるための隠しフォームを生成する -->
                    <!-- <input type="hidden" name="_method" value="DELETE"> -->
                    {{ method_field('DELETE') }}
                    <button type="submit" id="delete-expence-{{ $expence->id }}" class="btn btn-danger">
                      <i class="fa fa-btn fa-trash"></i>削除
                    </button>
                  </form>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  @endif
@endsection
