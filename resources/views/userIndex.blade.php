@extends('layouts.userLayout')

@section('title', 'Home')

@section('content')

@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif

<table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">No</th>
      <th scope="col">Gambar</th>
      <th scope="col">Nama Buah</th>
      <th scope="col">Jumlah</th>
      <th scope="col">Aktivitas</th>
    </tr>
  </thead>
  <tbody>
    @foreach($fruits as $fruit)
    <tr>
      <th scope="row">{{ $loop->iteration }}</th>
      <td><img src="{{ asset('uploads/fruit/' . $fruit->image ) }}" width="100px" height="100px" alt="{{ $fruit->name }}"></td>
      <td>{{ $fruit->name }}</td>
      <td>{{ $fruit->quantity }}</td>
      <td>
        <button type="button" id="TombolBuatPermintaan" class="TombolBuatPermintaan btn btn-primary my-3" type="button" data-toggle="modal" data-target="#exampleModalCenter" value="{{ $fruit->id }}" validation="{{ $fruit->quantity }}">
          Buat Permintaan
        </button>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

@endsection


<!-- Modal -->

<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Buat Permintaan</h5>
        </div>
        
        <form action="{{ url('user') }}" method="POST" data-remote="true" id="formAddRequest">
        @csrf
          <div class="modal-body">    
                  <div class="form-group">
                      <label for="addFruitQuantity">Amount</label>
                      <input type="text" class="form-control @error('amount') is-invalid @enderror" name="amount" id="addRequestAmount" placeholder="Amount..." value="{{ old('amount') }}">
                      <!-- <div id="QuantityErrorMsg" class="invalid-feedback"></div> -->
                      @error('amount')
                          <div class="invalid invalid-feedback">{{ $message }}</div>
                      @enderror
                  </div>
                  {{ Form::hidden('is_accepted', '0') }}
                    @php
                    $user_id = Auth::user()->id;
                    @endphp
                    
                  {{ Form::hidden('user_id', $user_id, array('id' => 'user_id')) }}
                  {{ Form::hidden('fruit_id', $fruit->id, array('id' => 'fruit_id')) }}
                  {{ Form::hidden('validation_qty', $fruit->quantity, array('id' => 'validation_qty')) }}
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
              <button type="submit" class="btn btn-success" id="submitAddButton">Tambah<button>
          </div>
        </form>
      </div>
    </div>
  </div>

@section('script')
    <script type="text/javascript">
    $(document).ready(function(){
      
      $(".TombolBuatPermintaan").on('click', function(){ 
      var fruit_id = $(this).attr('value');
      var validation_qty = $(this).attr('validation');
      // fill the data in the input fields
        $("#fruit_id").val(fruit_id);
        $("#validation_qty").val(validation_qty);
      });
    });
    </script>
@stop


