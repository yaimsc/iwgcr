@extends('layouts.form')

@section('title', 'IWG Communication Rooms Project')

@section('content')

<div id="card-contact" class="card">
  <div class="card-header">
    <h4 class="title">Installer Information</h4>
  </div>
<form method="POST" action="{{route('installer.store')}}" enctype="multipart/form-data">
  @csrf
  <select class="form-control" name="centre_name" id="centre_name" hidden>
    {{-- <option value="" hidden disabled selected class="placeholder">Select Centre</option> --}}
      @foreach ($centres as $centre)
        <option selected value="{{$centre->name}}">{{$centre->name}}</option>
      @endforeach
  </select>
  <div class="form-group">
    <label class="bmd-label-floating">Name</label>
    <input type="text" class="form-control @error('installer_name') is-invalid @enderror" name="installer_name" value="{{ old('installer_name') }}" id="installer_name" required autofocus>
    @error('installer_name')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
    @enderror
  </div>
  <div class="form-group">
    <label class="bmd-label-floating">Email</label>
    <input type="email" class="form-control @error('installer_email') is-invalid @enderror" name="installer_email" value="{{ old('installer_email') }}" id="installer_email">
    @error('installer_email')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
    @enderror
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <select class="form-control" name="installer_telephonecode" id="installer_telephonecode">
        {{-- @foreach(Session::get('centre_country_key') as $countrySelect)
          <option value="{{$countrySelect->telephonecode}}" selected class="placeholder">{{$countrySelect->name}} {{$countrySelect->telephonecode}}</option>
        @endforeach  --}}
        <option value="" hidden disabled selected class="placeholder">Select Phone Code<option>
        @foreach ($countries as $country)
          <option  value="{{$country->telephonecode}}">{{$country->name}} {{$country->telephonecode}}</option>
        @endforeach
      </select>
    </div>
    <div class="form-group col-md-6">
    <input type="tel" name="installer_telephone" id="installer_telephone" class="form-control @error('instaler_telephone') is-invalid @enderror" value="{{ old('installer_telephone') }}" placeholder="Ex. 943 29 05 34"/>
      @error('installer_telephone')
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