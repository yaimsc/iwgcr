@extends('layouts.form')

@section('title', 'IWG Communication Rooms Project')

@section('content')

<div id="card-contact" class="card">
  <div class="card-header">
    <h4 class="title">Installer Information</h4>
  </div>
  <form method="POST" enctype="multipart/form-data">
  @csrf
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
        {{-- @foreach(Session::get('country_key') as $countrySelect)
          <option value="{{$countrySelect->telephonecode}}" selected class="placeholder">{{$countrySelect->name}} {{$countrySelect->telephonecode}}</option>
        @endforeach --}}
        @foreach ($countries as $country)
          <option  value="{{$country->telephonecode}}">{{$country->name}} {{$country->telephonecode}}</option>
        @endforeach
      </select>
    </div>
    <div class="form-group col-md-6">
    <input type="tel" id="installer_telephone" class="form-control @error('instaler_phone') is-invalid @enderror" name="installer_phone" value="{{ old('installer_phone') }}" placeholder="Ex. 943 29 05 34"/>
      @error('installer_phone')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
      @enderror
    </div>
  </div>
  </form>
</div>
    
@endsection