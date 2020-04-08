@extends('layouts.form')

@section('title', 'IWG Communication Rooms Project')

@section('content')

<div id="card-contact" class="card">
  <div class="card-header">
    <h4 class="title">Installer Information</h4>
  </div>
  @if(Session::has('msg-post'))
  <div class="alert alert-warning alert-dismissible fade show" role="alert">
    <p>{{Session::get('msg-post')}}</p>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  @endif
<form method="POST" id="form-installer" action="{{route('installer.store')}}" enctype="multipart/form-data">
  @csrf
  <select class="form-control" name="centre_number" id="centre_number" hidden>
    {{-- <option value="" hidden disabled selected class="placeholder">Select Centre</option> --}}
      @foreach ($centres as $centre)
        <option selected value="{{$centre->number}}">{{$centre->number}}</option>
      @endforeach
  </select>
  <div class="form-group">
    <label class="bmd-label-floating">Name</label>
    <input 
      type="text" 
      class="form-control @error('installer_name') is-invalid @enderror" 
      name="installer_name" value="{{ old('installer_name') }}" 
      id="installer_name"
      data-parsley-pattern="^[a-zA-ZÀ-ÿ\u00f1\u00d1]+(\s*[a-zA-ZÀ-ÿ\u00f1\u00d1]*)*[a-zA-ZÀ-ÿ\u00f1\u00d1]+$"  
      required 
      autofocus
    >
    @error('installer_name')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
    @enderror
  </div>
  <div class="form-group">
    <label class="bmd-label-floating">Email</label>
    <input type="email" class="form-control @error('installer_email') is-invalid @enderror" name="installer_email" value="{{ old('installer_email') }}" id="installer_email" required>
    @error('installer_email')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
    @enderror
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <select class="form-control" name="installer_telephonecode" id="installer_telephonecode" required>
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
    <input type="tel" name="installer_telephone" id="installer_telephone" class="form-control @error('instaler_telephone') is-invalid @enderror" value="{{ old('installer_telephone') }}" placeholder="Ex. 943 29 05 34" required/>
      @error('installer_telephone')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
      @enderror
    </div>
    <div class="letra">
      <p>The controller of the personal data provided in this form is Salto Systems, S.L. (“Salto”), who will process it in order to communicate with your Centre for providing the products and/or services requested as well as process and meet your request of receiving a quote for the products and services commercialized by Salto. You can exercise through the email privacy@saltosystems.com your rights of access, rectification, erasure, restriction, objection, data portability and not to be subject to a decision based solely on automated processing. Your data will not be used for profiling. <a href="/privacy/Privacy_Policy_IWG_Comms_Rooms.pdf"> Please click here to find additional Information on Data Protection. </a> </p>
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