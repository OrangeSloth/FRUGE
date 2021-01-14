@extends('layouts.userLayout')

@section('title', 'Riwayat')

@section('content')
<link href="{{ asset('css/request.css') }}" type="text/css" rel="stylesheet">

 
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif

<table class="table warna-tabel">
  <thead class="thead-light">
    <tr>
      <th scope="col">No</th>
      <th scope="col">Gambar</th>
      <th scope="col">Nama Buah</th>
      <th scope="col">Jumlah</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
    @foreach($requests as $request)
    <tr>
      <th scope="row"><div class="posisi-angka" >{{ $loop->iteration }}</div></th>
      <td><div><img src="{{ asset('uploads/fruit/' . $request->image ) }}" width="100px" height="100px" alt="{{ $request->name }}"></div></td>
      <td><div class="tinggi-atur">{{ $request->name }}</div></td>
      <td><div class="tinggi-atur">{{ $request->amount }}</div></td>
      @if($request->is_accepted == 0)
      <td><img class="border-img" src="{{ asset('assets/pending.png') }}"  alt=""></td>
      @elseif($request->is_accepted == 1)
      <td><img class="border-img" src="{{ asset('assets/accepted_icon.PNG') }}"  alt=""></td>
      @else
      <td><img class="border-img" src="{{ asset('assets/reject_icon.PNG') }}"  alt=""></td>
      @endif
    </tr>
    @endforeach
  </tbody>
</table>
@endsection
