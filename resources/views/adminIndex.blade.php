@extends('layouts.adminLayout')

@section('title', 'Home')

@section('content')

<table class="table">
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
      <th scope="row">{{ $loop->iteration }}</th>
      <td>{{ $request->name }}</td>
      <td>{{ $request->nama }}</td>
      <td>{{ $request->amount }}</td>
      @if($request->is_accepted == 0)
      <td>
        <form action="/admin/request/{{ $request->id }}" method="POST" data-remote="true" enctype="multipart/form-data">
        @method('patch')
        @csrf
        <input type="hidden" name="is_accepted" id="acceptRequest" value="{{ 1 }}">
        <input type="hidden" name="amount" id="acceptRequest" value="{{ $request->amount }}">
        <button type="submit" class="btn btn-outline-success"  style="display: inline-block;" >Terima</button>
        </form>
        <form action="/admin/request/{{ $request->id }}" method="POST" data-remote="true" enctype="multipart/form-data">
        @method('patch')
        @csrf
        <input type="hidden" name="is_accepted" id="acceptRequest2" value="{{ 2 }}">
        <input type="hidden" name="amount" id="acceptRequest" value="{{ 0 }}">
        <button type="submit" class="btn btn-outline-danger"  style="display: inline-block;">Tolak</button>
        </form>
      </td>
      @else
      <td><button  class="btn btn-outline-secondary " disabled >Telah Diproses</button></td>
      @endif
    </tr>
    @endforeach
  </tbody>
</table>
@endsection