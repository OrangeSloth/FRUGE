@extends('layouts.adminLayout')

@section('title', 'Storage')

@section('content')

@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif


<div class="container">
  <div class="row">
    @foreach($fruits as $fruit)
    <div class="col-sm-3">
      <div class="row">
        {{ $loop->iteration }}
      </div>  
    </div>
    @endforeach
  </div>
</div>


  <a class="btn btn-primary my-3" href="{{ url('admin/fruits/create') }}">
    Tambah Buah
  </a>

<table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">No</th>
      <th scope="col">Fruit Image</th>
      <th scope="col">Fruit Name</th>
      <th scope="col">Quantity</th>
      <th scope="col">Activity</th>
    </tr>
  </thead>
  <tbody>
    @foreach($fruits as $fruit)
    <tr>
      <th scope="row">{{ $loop->iteration }}</th>
      <td><img src="{{ asset('uploads/fruit/' . $fruit->image ) }}" width="100px" height="100px" alt=""></td>
      <td>{{ $fruit->name }}</td>
      <td>{{ $fruit->quantity }}</td>
      <td>
        <a href="/admin/fruits/{{$fruit->id}}/edit" class="btn btn-outline-warning" >Update</a>
        <form action="/admin/fruits/{{$fruit->id}}" method="post">
          @method('delete')
          @csrf
          <button type="submit" class="btn btn-outline-danger" >Delete</button>
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

@endsection