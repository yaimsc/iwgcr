@extends('layouts.form')

@section('title', 'IWG Communication Rooms Project Survey')

@section('content')

<div id="card-contact" class="card">
  <div class="card-header">
    <h4 class="title">Centre Staff Contact Person<h4>
    @foreach ($centres as $centre)
    <h4 class="title">{{$centre->name}}</h4>
    @endforeach
  </div>
  <form method="POST" action="{{route('contactPerson.store')}}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label class="bmd-label-floating">Name</label>
      <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name') }}" required autofocus/> 
        @error('name')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <select class="form-control" name="centre_telephonecode" id="centre_telephonecode">
          @foreach(Session::get('country_key') as $countrySelect)
            <option value="{{$countrySelect->telephonecode}}" selected class="placeholder">{{$countrySelect->name}} {{$countrySelect->telephonecode}}</option>
          @endforeach
          @foreach ($countries as $country)
            <option  value="{{$country->telephonecode}}">{{$country->name}} {{$country->telephonecode}}</option>
          @endforeach
        </select>
      </div>
      <div class="form-group col-md-6">
      <input type="tel" id="centre_telephone" class="form-control @error('centre_phone') is-invalid @enderror" name="centre_phone" value="{{ old('centre_phone') }}" placeholder="Ex. 943 29 05 34"/>
        @error('centre_phone')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <select class="form-control" name="mobile_telephonecode" id="mobile_telephonecode">
        <option value="{{$countrySelect->telephonecode}}" selected class="placeholder">{{$countrySelect->name}} {{$countrySelect->telephonecode}}</option>
            @foreach ($countries as $country)
              <option value="{{$country->telephonecode}}">{{$country->name}} {{$country->telephonecode}}</option>
            @endforeach
        </select>
      </div>
      <div class="form-group col-md-6">
      <input type="tel" id="mobile_telephone" class="form-control @error('mobile_phone') is-invalid @enderror" name="mobile_phone" value="{{ old('mobile_phone') }}" placeholder="Ex. 671 29 05 34"/>
        @error('mobile_phone')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>
    </div>
    <div class="form-group">
      <label class="bmd-label-floating">Email</label>
      <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required/>
      @error('email')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
      @enderror
    </div>
    {{-- <div class="form-group"> --}}
      <select class="form-control" name="centre_name" id="centre" hidden>
        {{-- <option value="" hidden disabled class="placeholder">Select Centre</option> --}}
          @foreach ($centres as $centre)
            <option selected value="{{$centre->name}}">{{$centre->name}}</option>
          @endforeach
      </select>
    {{-- </div>  --}}
    <div class="submit">
      <button type="submit" class="btn">
        {{ __('NEXT') }}
    </button>
    </div>
  </form>
</div>
<div class="back">
  <a href="javascript:history.back()">Back</a>
</div>

@endsection 