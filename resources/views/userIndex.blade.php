@extends('layouts.userLayout')

@section('title', 'Home')

@section('content')


@if (session('login'))
    <div class="alert alert-success">
        {{ session('login') }}
    </div>
@endif



<div class="row">
  <div class="col-md-3">
    <h1>Permintaan</h1>
  </div>
</div>
  
@if (session('status'))
    <div class="alert alert-danger">
        {{ session('status') }}
    </div>
@endif

<div class="container">
  <div class="row">
    @foreach($fruits as $fruit)
    <div class="col-md-3">
      <div class="fruit">
        <div class="gambar-buah"><img src="{{ asset('uploads/fruit/' . $fruit->image ) }}" width="150px" height="150px" alt=""></div>
        <div class="nama-buah"><font>{{ $fruit->name }}</font></div>
        <div class="qty-buah"><font>{{ $fruit->quantity }}</font></div>
        <div class="tombol-buah">
          <button type="button" id="TombolBuatPermintaan" class="TombolBuatPermintaan" type="button" data-toggle="modal" data-target="#exampleModalCenter" value="{{ $fruit->id }}" validation="{{ $fruit->quantity }}">
            <img class="border-img" src="{{ asset('assets/permintaan.PNG') }}"  alt="">
          </button>
        </div>
      </div>  
    </div>
    @endforeach
  </div>
</div>

@endsection


<!-- Modal -->

<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="exampleModalLongTitle">Permintaan Buah</h4>
        </div>
        
        <form action="{{ url('user') }}" method="POST" data-remote="true" id="formAddRequest">
        @csrf
          <div class="modal-body">    
                  <div class="form-group">
                      <label for="addFruitQuantity"><font>Jumlah</font></label>
                      <input type="text" class="form-control @error('amount') is-invalid @enderror" name="amount" id="addRequestAmount" placeholder="Jumlah..." value="{{ old('amount') }}">
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
              <button type="submit" class="btn btn-success" id="submitAddButton">Konfirmasi</button>
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


