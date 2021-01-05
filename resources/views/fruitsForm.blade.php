@extends('layouts.adminLayout')

@section('title', 'Form Tambah Buah')

@section('content')
<link href="{{ asset('css/formTambahBuah.css') }}" type="text/css" rel="stylesheet">

@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif  

  <h1>Form Tambah Buah</h1>

  <form action="{{ url('admin/fruits') }}" method="POST" data-remote="true" id="formAddFruit" enctype="multipart/form-data">
  @csrf
    <div class="form-group">
      <label for="addFruitName">Fruit Name</label>
      <input type="text" class="form-control ganti-hover @error('name') is-invalid @enderror" name="name" id="addFruitName" placeholder="Fruit name..." value="{{ old('name') }}">
      @error('name')
          <div class="invalid invalid-feedback">{{ $message }}</div>
      @enderror
    </div>
    <div class="form-group">
        <label for="addFruitQuantity">Quantity</label>
        <input type="text" class="form-control ganti-hover @error('quantity') is-invalid @enderror" name="quantity" id="addFruitQuantity" placeholder="Quantity..." value="{{ old('quantity') }}">
        <!-- <div id="QuantityErrorMsg" class="invalid-feedback"></div> -->
        @error('quantity')
            <div class="invalid invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
      <label for="addFruitImage" class="mr-2">Gambar Buah</label>
      <input type="file" class="@error('image') is-invalid @enderror" name="image" id="addFruitImage" placeholder="Foto buah..." value="{{ old('image') }}">
      @error('image')
          <div class="invalid invalid-feedback">{{ $message }}</div>
      @enderror
    </div>
    <a href="{{ url('admin/fruits') }}" class="btn btn-danger" >Kembail</a>
    <button type="submit" class="btn btn-success" >Tambah</button>
  </form>

@endsection