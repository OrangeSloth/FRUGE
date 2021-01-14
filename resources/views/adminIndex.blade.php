@extends('layouts.adminLayout')

@section('title', 'Beranda')

@section('content')

@if (session('login'))
    <div class="alert alert-success">
        {{ session('login') }}
    </div>
@endif

<div class="row">
  <div class="col mb-3">
    <h1>Permintaan User</h1>
  </div>
</div>



<table class="table warna-tabel">
  <thead class="thead-light">
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama</th>
      <th scope="col">Buah</th>
      <th scope="col">Jumlah</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    @foreach($requests as $request)
    <tr>
      <th scope="row"><div class="tinggi-atur">{{ $loop->iteration }}</div></th>
      <td><div class="tinggi-atur">{{ $request->name }}</div></td>
      <td><div class="tinggi-atur">{{ $request->nama }}</div></td>
      <td><div class="tinggi-atur">{{ $request->amount }}</div></td>
      @if($request->is_accepted == 0)
      <td>
        <div class="lurusan">
          <form action="/admin/request/{{ $request->id }}" method="POST" class="terima" data-remote="true" enctype="multipart/form-data">
            @method('patch')
            @csrf
            <input type="hidden" name="is_accepted" id="acceptRequest" value="{{ 1 }}">
            <input type="hidden" name="amount" id="acceptRequest" value="{{ $request->amount }}">
            <button type="submit" class="btn btn-outline-success"><img class="border-img" src="{{ asset('assets/accept_button.PNG') }}" alt=""></button>
          </form>
          <form action="/admin/request/{{ $request->id }}" method="POST" class="tolak" data-remote="true" enctype="multipart/form-data">
            @method('patch')
            @csrf
            <input type="hidden" name="is_accepted" id="acceptRequest2" value="{{ 2 }}">
            <input type="hidden" name="amount" id="acceptRequest" value="{{ 0 }}">
            <button type="submit" class="btn btn-outline-danger"><img class="border-img" src="{{ asset('assets/reject_button.png') }}" alt=""></button>
          </form>
        </div>
      </td>
      @elseif($request->is_accepted == 1)
      <td><img class="border-img" src="{{ asset('assets/accepted_icon.PNG') }}"  alt=""></td>
      @else
      <td><img class="border-img" src="{{ asset('assets/reject_icon.png') }}"  alt=""></td>
      @endif
    </tr>
    @endforeach
  </tbody>
</table>
@endsection