@extends('layouts.app')
@section('content')
  <div class="panel-body">
    <!-- バリデーションエラーの表示 -->
    @include('common.errors')
    <form action="{{ url('/category/store') }}" method="POST" class="form-horizontal">
      {{ csrf_field() }}
      <!-- タスク名 -->
      <div class="form-group">
        <label for="category-name" class="col-sm-3 control-label">Name</label>
        <div class="col-sm-6">
          <input type="text" name="name" id="category-name" class="form-control" value="{{old('name')}}" required>
        </div>
      </div>
      <div class="form-group">
        <label for="category-budget" class="col-sm-3 control-label">Budget</label>
        <div class="col-sm-6">
          <input type="text" name="budget" id="category-budget" class="form-control" value="{{old('budget')}}" required>
        </div>
      </div>
      <!-- タスク追加ボタン -->
      <div class="form-group">
        <div class="col-sm-offset-3 col-sm-6">
          <button type="submit" class="btn btn-primary">
            <i class="fa fa-plus"></i> <span>作成</span>
          </button>
        </div>
      </div>
    </form>
  </div>
@endsection
