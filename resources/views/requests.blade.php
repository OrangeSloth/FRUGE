@extends('layouts.userLayout')

@section('title', 'Permintaan')

@section('content')

<table class="table">
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
      <th scope="row">{{ $loop->iteration }}</th>
      <td><img src="{{ asset('uploads/fruit/' . $request->image ) }}" width="100px" height="100px" alt="{{ $request->name }}"></td>
      <td>{{ $request->name }}</td>
      <td>{{ $request->amount }}</td>
      @if($request->is_accepted == 0)
      <td>Pending</td>
      @elseif($request->is_accepted == 1)
      <td>Diterima</td>
      @else
      <td>Ditolak</td>
      @endif
    </tr>
    @endforeach
  </tbody>
</table>

@endsection
