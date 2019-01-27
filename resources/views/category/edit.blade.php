@extends('layouts.app')
@section('content')
  <div class="panel-body">
    <form action="{{url('/category/'.$category->id.'/update')}}" method="POST" class="form-horizontal">
      {{ csrf_field() }}
      <div class="form-group">
        <label for="category-name" class="col-sm-3 control-label">Name</label>
        <div class="col-sm-6">
          <input type="text" name="name" id="category-name" class="form-control" value="{{$category->name}}">
        </div>
      </div>
      <div class="form-group">
        <label for="category-budget" class="col-sm-3 control-label">Budget</label>
        <div class="col-sm-6">
          <input type="text" name="budget" id="category-budget" class="form-control" value="{{$category->budget}}" required>
        </div>
      </div>

      <!-- タスク追加ボタン -->
      <div class="form-group">
        <div class="col-sm-offset-3 col-sm-6">
          <button type="submit" class="btn btn-warning">
            <i class="fa fa-pencil"></i> <span>更新</span>
          </button>
        </div>
      </div>
    </form>
  </div>
@endsection
