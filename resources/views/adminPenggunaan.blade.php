@extends('layouts.adminLayout')

@section('title', 'Cara Penggunaan')

@section('content')
<link href="{{ asset('css/penggunaanAdmin.css') }}" type="text/css" rel="stylesheet">

<div class="row">
    <div class="col">
        <img src="{{ asset('assets/cara_penggunaan_ikon_admin.PNG') }}" alt="">
    </div>
</div>

<div class="row">
    <div class="col">
        <img src="{{ asset('assets/cara_penggunaan_ikon_stok_admin.PNG') }}" alt="">
    </div>
</div>

<div class="row">
    <div class="col">
        <img src="{{ asset('assets/cara_penggunaan_ikon_kelola_admin.PNG') }}" alt="">
    </div>
</div>

@endsection
