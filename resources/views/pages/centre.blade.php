@extends('layouts.form')
@section('title', 'IWG Communication Roms Project Survey')
@section('content')
<div id="card-contact" class="card">
  <div class="card-header">
    <h4 class="title">Centre Information<h4>
  </div>
  <form method="POST" action="{{route('centre.store')}}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label class="bmd-label-floating">Centre Name</label>
    <input type="text" class="form-control @error('centre_name') is-invalid @enderror" name="centre_name" value="{{ old('centre_name') }}" id="centre_name" required autofocus/> 
       @error('centre_name')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
      @enderror
    </div>
    <div class="form-group">
      <label class="bmd-label-floating">Centre Number/ID</label>
      <input type="number" class="form-control @error('centre_number') is-invalid @enderror" name="centre_number" value="{{ old('centre_number') }}" required/>
      <small class="text-muted">If Centre Number/ID does not have 4 digits, put 0 before. e.g. 0074</small>
      @error('centre_number')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
      @enderror
    </div>
    <div class="form-group">
      <label class="bmd-label-floating">Address</label>
      <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}"/>
      @error('address')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
      @enderror
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label class="bmd-label-floating">City</label>
        <input type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city') }}"/>
        @error('city')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>
      <div class="form-group col-md-6">
        <label class="bmd-label-floating">Postal Code</label>
      <input type="text" class="form-control @error('postal_code') is-invalid @enderror" name="postal_code" value="{{ old('postal_code') }}" />
        @error('postal_code')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label class="bmd-label-floating">Province/State</label>
      <input type="text" class="form-control @error('province') is-invalid @enderror" name="province" value="{{ old('province') }}"/>
        @error('province')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>
      <div class="form-group col-md-6" id="country">
        <select class="form-control @error('country') is-invalid @enderror" name="country" id="country" value="{{ old('country') }}">
          <option value="" hidden disabled selected class="placeholder">Select Country</option>
            @foreach ($countries as $country)
              <option value="{{$country->name}}">{{$country->name}}</option>
            @endforeach
        </select>
        @error('country')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>
    </div>
    <div class="submit">
      <button type="submit" class="btn">
        {{ __('NEXT') }}
      </button>
    </div>
  </form>
</div>
<script>
  var msg = '{{Session::get('alert')}}';
  var exist = '{{Session::has('alert')}}';
  if(exist){
    alert(msg);
  }
</script>

@endsection