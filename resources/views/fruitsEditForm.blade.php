@extends('layouts.adminLayout')

@section('title', 'Form Ubah Data Buah')

@section('content')
<link href="{{ asset('css/formEditBuah.css') }}" type="text/css" rel="stylesheet">

@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif  

  <h1>Form Ubah Data Buah</h1>

  <form action="/admin/fruits/{{$fruit->id}}" method="POST" data-remote="true" id="formAddFruit" enctype="multipart/form-data">
  @method('patch')
  @csrf
    <div class="form-group">
      <label for="addFruitName">Fruit Name</label>
      <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="addFruitName" placeholder="Fruit name..." value="{{ $fruit->name }}">
      @error('name')
          <div class="invalid invalid-feedback">{{ $message }}</div>
      @enderror
    </div>
    <div class="form-group">
        <label for="addFruitQuantity">Quantity</label>
        <input type="text" class="form-control @error('quantity') is-invalid @enderror" name="quantity" id="addFruitQuantity" placeholder="Quantity..." value="{{ $fruit->quantity }}">
        <!-- <div id="QuantityErrorMsg" class="invalid-feedback"></div> -->
        @error('quantity')
            <div class="invalid invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <a href="{{ url('admin/fruits') }}" class="btn btn-danger" >Kembail</a>
    <button type="submit" class="btn btn-success" >Ubah</button>
  </form>

@endsection