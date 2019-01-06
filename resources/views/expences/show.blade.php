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
@endsection
