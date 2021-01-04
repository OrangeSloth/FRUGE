@extends('layouts.layout')

@section('title', 'FRUGE')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <img class="gambar" src="{{ asset('/assets/logo_home_besar.PNG')}}" class="img-responsive" alt="" />
            <div id="slogan">
                <h1>Pengaturan gudang buah terintergrasi</h1>
            </div>
            <img class="gambar" src="{{ asset('/assets/buah.PNG')}}" class="img-responsive" alt="" />
        </div>
    </div>
</div>
@endsection
