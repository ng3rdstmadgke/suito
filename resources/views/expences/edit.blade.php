@extends('layouts.app')
@section('content')
  <div class="panel-body">
    <form action="{{url('/expences/'.$expence->id.'/update')}}" method="POST" class="form-horizontal">
      {{ csrf_field() }}
      <!-- タスク名 -->
      <div class="form-group">
        <label for="expence-date" class="col-sm-3 control-label">Date</label>
        <div class="col-sm-6">
          <input type="date" name="date" id="expence-date" class="form-control" value="{{substr($expence->date, 0, 10)}}" required>
        </div>
      </div>
      <div class="form-group">
        <label for="expence-category" class="col-sm-3 control-label">Category</label>
        <div class="col-sm-6">
          <select class="form-control" id="expence-category" name="category_id">
            @foreach ($categories as $category))
              @if ($expence->category_id === $category->id)
                <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
              @else
                <option value="{{ $category->id }}">{{ $category->name }}</option>
              @endif
            @endforeach
          </select>
        </div>
      </div>
      <div class="form-group">
        <label for="expence-name" class="col-sm-3 control-label">Name</label>
        <div class="col-sm-6">
          <input type="text" name="name" id="expence-name" class="form-control" value="{{$expence->name}}">
        </div>
      </div>
      <div class="form-group">
        <label for="expence-price" class="col-sm-3 control-label">Price</label>
        <div class="col-sm-6">
          <input type="text" name="price" id="expence-price" class="form-control" value="{{$expence->price}}" required>
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
