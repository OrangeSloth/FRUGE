@extends('layouts.layout')

@section('title', 'Daftar')

@section('content')
    <link href="{{ asset('css/register.css') }}" type="text/css" rel="stylesheet">
       <!-- Main Section -->
       <section class="main-section">
        <!-- Add Your Content Inside -->
        <div class="content">
            <!-- Remove This Before You Start -->
            <div class="row">
                <div class="col">
                    <h1 class="ijo">Daftar</h1>
                </div>
            </div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="row">
                <div class="col-sm-8">
                    <form action="{{ url('/registerPost') }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="name" class="ijo">Nama lengkap</label>
                            <input type="text"  class="form-control" id="name" name="name">
                        </div>
                        <div class="form-group">
                            <label for="email" class="ijo">Alamat email</label>
                            <input type="email" class="form-control" id="email" name="email">
                        </div>
                        <div class="form-group">
                            <label for="password" class="ijo">Kata sandi</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation" class="ijo">Konfirmasi sandi</label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                        </div>
                        <div class="form-group">
                            <input type="hidden"  class="form-control" id="is_admin" name="is_admin" value="0">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-md btn-primary" id="tombolIjo">Daftar</button>
                            <label for="" class="ijo">sudah punya akun?</label>
                            <a href="{{url('login')}}" class="warning">Masuk</a>
                        </div>
                    </form>
                </div>
                <div class="col-sm-4">
                    <img src="{{ asset('/assets/logo_login_signin kanan_besar.PNG')}}" class="img-responsive" alt="Fruge" height="300px" width="auto"/>
                </div>
            </div>
        </div>
        <!-- /.content -->
    </section>
    <!-- /.main-section -->
@endsection