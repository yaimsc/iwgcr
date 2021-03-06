@extends('layouts.form')
@section('title', 'IWG Communication Roms Project Survey')
@section('content')
<div id="card-contact" class="card">
  <div class="card-header">
    <h4 class="title">Centre Information<h4>
  </div>
  @if(Session::has('msg-pre'))
  <div class="alert alert-warning alert-dismissible fade show" role="alert">
    <p>{{Session::get('msg-pre')}}</p>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  @endif
  <form method="POST" id="form-centre" action="{{route('centre.store')}}" enctype="multipart/form-data">
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
 
    <input type="text" class="form-control @error('centre_name') is-invalid @enderror" name="centre_number" value="{{ Session::get('number_key')}}" hidden/> 
    {{-- <div class="form-group">
      <label class="bmd-label-floating">Centre Number</label>
      <input type="number" class="form-control @error('centre_number') is-invalid @enderror" name="centre_number" value="{{ old('centre_number') }}" required/>
      <small class="text-muted">If Centre Number does not have 4 digits, put 0 before. e.g. 0074</small>
      @error('centre_number')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
      @enderror
    </div> --}}
    <div class="form-group">
      <label class="bmd-label-floating">Address</label>
      <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required/>
      @error('address')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
      @enderror
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label class="bmd-label-floating">City</label>
        <input type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city') }}" required/>
        @error('city')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>
      <div class="form-group col-md-6">
        <label class="bmd-label-floating">Postal Code</label>
        <input type="text" class="form-control @error('postal_code') is-invalid @enderror" name="postal_code" value="{{ old('postal_code') }}" minlength="4" required/>
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
        <input type="text" class="form-control @error('province') is-invalid @enderror" name="province" value="{{ old('province') }}" required/>
        @error('province')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>
      <div class="form-group col-md-6" id="country">
        <select class="form-control @error('country') is-invalid @enderror" name="country" id="country" value="{{ old('country') }}" required>
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

@endsection