@extends('layouts.layout')

@section('title', 'Login')

@section('content')
   <!-- Main Section -->
   <link href="{{ asset('css/login.css') }}" type="text/css" rel="stylesheet">
   <section class="main-section">
        <!-- Add Your Content Inside -->
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1 class="ijo">Masuk</h1>
                </div>
            </div>
            @if(Session::has('alert'))
                <div class="row">
                    <div class="alert alert-danger">
                        <div>{{Session::get('alert')}}</div>
                    </div>
                </div>
            @endif
            @if(Session::has('alert-success'))
                <div class="alert alert-success">
                    <div>{{Session::get('alert-success')}}</div>
                </div>
            @endif
            <div class="row">
                <div class="col col-sm-8">
                    <form action="{{ url('/loginPost') }}" method="post">
                        <div class="row">
                            {{ csrf_field() }}
                            <div class="form-group col-md-12">
                                <label for="email" class="ijo">Alamat email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email"  value="{{ old('email') }}">
                                @error('email')
                                    <div class="invalid invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="alamat" class="ijo">Kata sandi</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" value="{{ old('password') }}">
                                @error('password')
                                    <div class="invalid invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <button type="submit" class="btn btn-md btn-primary col-md-2 ml-3 mr-2" id="tombolIjo">Masuk</button>
                            <div class="col-md-9">
                                <div class="row">
                                    <p class="mr-1 ijo">belum punya akun?</p>
                                    <a href="{{url('register')}}" class="warning"><font>Daftar</font></a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col col-sm-4">
                    <img src="{{ asset('/assets/logo_login_signin kanan_besar.PNG')}}" class="img-responsive" alt="Fruge" height="300px" width="auto"/>
                </div>
            </div>
        </div>
        <!-- /.content -->
    </section>
    <!-- /.main-section -->
@endsection