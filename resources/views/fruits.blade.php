@extends('layouts.adminLayout')

@section('title', 'Stok Buah')

@section('content')
<link href="{{ asset('css/fruits.css') }}" type="text/css" rel="stylesheet">
   
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif

<div class="row">
  <div class="col-md-3">
    <!-- <img src="{{ asset('assets/cara_penggunaan_ikon_stok_admin.PNG') }}" width="auto" height="220px" alt="Penjelasan Ikon"> -->
    <h1 class="mb-3">Stok Buah</h1>
  </div>
</div>
<div class="row mb-4">
  <div class="col-md-3 tombol-tambah">
    <a class="" href="{{ url('admin/fruits/create') }}">
      <img class="border-img" src="{{ asset('assets/stok_tambah_button.PNG') }}" height="50px" alt="Tambah">
    </a>
  </div>
</div>


<div class="container">
  <div class="row">
    @foreach($fruits as $fruit)
    <div class="col-md-3">
      <div class="fruit">
        <div class="gambar-buah"><img src="{{ asset('uploads/fruit/' . $fruit->image ) }}" width="150px" height="150px" alt=""></div>
        <div class="nama-buah"><font>{{ $fruit->name }}</font></div>
        <div class="qty-buah"><font>{{ $fruit->quantity }}</font></div>
        <div class="tombol-buah">
          <div class="update-buah">
            <a href="/admin/fruits/{{$fruit->id}}/edit" class="">
              <img class="border-img" src="{{ asset('assets/edit_button.PNG') }}"  alt="">
            </a>
          </div>
          <div class="delete-buah">
            <form action="/admin/fruits/{{$fruit->id}}" method="post" class="delete_form">
              @method('delete')
              @csrf
              <button type="submit" class="" id="submitDeleteButton">
                <img class="border-img" src="{{ asset('assets/delete_button.PNG') }}"  alt="">
              </button>
            </form>
          </div>
        </div>
      </div>  
    </div>
    @endforeach
  </div>
</div>

@endsection