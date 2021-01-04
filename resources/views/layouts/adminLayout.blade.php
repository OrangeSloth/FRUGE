<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="icon" class="icon" href="{{ asset('assets/logo_home_bar.PNG') }}"/>
    <title>@yield('title')</title>
    <link href="{{ asset('css/adminHome.css') }}" type="text/css" rel="stylesheet">
  </head>
  <body>
        <nav class="navbar navbar-expand-sm navbar-light bg-light mb-3">
           <a href="{{ url('/admin') }}" class="navbar-brand"><img src="{{ asset('/assets/logo_home_bar.PNG')}}" class="img-responsive" alt="" height="50px" width="50px"/></a>
            <!-- <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarMenu">
                <span class="navbar-toggler icon"></span>
            </button> -->
            <div class="collapse navbar-collapse" id="navbarMenu">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item warna-tombol">
                        <a class="nav-link" href="{{ url('admin/penggunaan') }}"><font>Cara penggunaan</font></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link warna-tombol" href="{{ url('admin/fruits') }}"><font>Stok</font></a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    @php
                    $name = Auth::user()->name;
                    @endphp
                    <li class="nav-item">
                        <a class="nav-link warna-tombol" href=""><font>{{ $name }}</font></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link warna-tombol" id="tombol-keluar" href="{{ url('logout') }}"><font>Keluar</font></a>
                    </li>
                </ul>
            </div>
        </nav>
    
    <div class="container">
        @yield('content')
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    @yield('script')

    </body>
</html>