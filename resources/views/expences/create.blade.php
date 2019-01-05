@extends('layouts.app')
@section('content')
  <div class="panel-body">
    <!-- バリデーションエラーの表示 -->
    @include('common.errors')
    <form action="{{ url('/expences') }}" method="POST" class="form-horizontal">
      {{ csrf_field() }}
      <!-- タスク名 -->
      <div class="form-group">
        <label for="expence-date" class="col-sm-3 control-label">Date</label>
        <div class="col-sm-6">
          <input type="date" name="date" id="expence-date" class="form-control" value="{{date('Y-m-d')}}" required>
        </div>
      </div>
      <div class="form-group">
        <label for="expence-category" class="col-sm-3 control-label">Category</label>
        <div class="col-sm-6">
          <input type="text" name="category" id="expence-category" class="form-control" required>
        </div>
      </div>
      <div class="form-group">
        <label for="expence-name" class="col-sm-3 control-label">Name</label>
        <div class="col-sm-6">
          <input type="text" name="name" id="expence-name" class="form-control">
        </div>
      </div>
      <div class="form-group">
        <label for="expence-price" class="col-sm-3 control-label">Price</label>
        <div class="col-sm-6">
          <input type="text" name="price" id="expence-price" class="form-control" required>
        </div>
      </div>

      <!-- タスク追加ボタン -->
      <div class="form-group">
        <div class="col-sm-offset-3 col-sm-6">
          <button type="submit" class="btn btn-default">
            <i class="fa fa-plus"></i> Add Expence
          </button>
        </div>
      </div>
    </form>
  </div>
@endsection
