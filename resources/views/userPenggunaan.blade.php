@extends('layouts.userLayout')

@section('title', 'Cara Penggunaan')

@section('content')
<link href="{{ asset('css/penggunaanUser.css') }}" type="text/css" rel="stylesheet">

<div class="row">
    <div class="col">
        <img src="{{ asset('assets/cara_penggunaan_bar_navigasi.png') }}" alt="">
    </div>
</div>

<div class="row">
    <div class="col">
        <img src="{{ asset('assets/cara_penggunaan_ikon_minta_user.PNG') }}" alt="">
    </div>
</div>

@endsection