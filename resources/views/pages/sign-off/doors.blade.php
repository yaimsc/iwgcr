@extends('layouts.form')

@section('title', 'IWG Communication Rooms Project')

@section('content')

<div class="row">
    <h2 class="title-white">Mandatory Post-Installation Documentation</h2>
</div>
<div class="doors-content">
  <form method="POST" id="form-signoff" action="{{route('sign-off.store')}}" enctype="multipart/form-data">
    @csrf
    <div class="doors">
    <div id="photo">
      {{-- <select class="form-control" name="centre_number" id="centre_number" hidden> --}}
        {{-- <option value="" hidden disabled selected class="placeholder">Select Centre</option> --}}
          {{-- @foreach ($centres as $centre)
            <option selected value="{{$centre->number}}">{{$centre->number}}</option>
          @endforeach
      </select> --}}
      <div class="card">
        <label class="title">Cylinder Interior Photo</label>
        <input class="form-control @error('interior_photo') is-invalid @enderror" type="file" name="interior_photo" value="{{ old('interior_photo') }}" required/>
        @error('interior_photo')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>
      <div class="card">
        <label class="title">Cylinder Exterior Photo</label>
        <input class="form-control @error('exterior_photo') is-invalid @enderror" type="file" name="exterior_photo" value="{{ old('exterior_photo') }}" required />
        @error('exterior_photo')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>
      <div class="card">
        <label class="title">IQ Installation Photo</label>
        <input class="form-control @error('installation_photo') is-invalid @enderror" type="file" name="installation_photo" value="{{ old('installation_photo') }}" required/>
        @error('installation_photo')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>
      <div class="card">
        <label class="title">IQ + Cylinder Photo (to evaluate distance)</label>
        <input class="form-control @error('iq_cylinder_photo') is-invalid @enderror" type="file" name="iq_cylinder_photo" value="{{ old('iq_cylinder_photo') }}" required/>
        @error('iq_cylinder_photo')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>
    </div>
    <div class="card">
      <div class="checkbox">
        <label>
          <input type="checkbox" name="purple_light" class="@error('purple_light') is-invalid @enderror" required>IQ shows purple light
        </label>
        @error('purple_light')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>
      <div class="checkbox">
        <label>
          <input type="checkbox" name="mac_whitelisted" class="@error('mac_whitelisted') is-invalid @enderror" required>IQ Mac address has been whitelisted
        </label>
        @error('purple_light')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>
      <div class="checkbox">
        <label>
          <input type="checkbox" name="centre_activated_titan" class="@error('centre_activated_titan') is-invalid @enderror" required>Centre has been activated in Titan
        </label>
        @error('purple_light')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>
      <div class="checkbox">
        <label>
          <input type="checkbox" name="maintenance_tags_given_centre" class="@error('maintenance_tags_given_centre') is-invalid @enderror" required>Maintenance kit and tags have been given to centre staff
        </label>
        @error('purple_light')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>
    </div>
  </div>
    <div class="submit">
      <button type="submit" class="btn-light">
        {{ __('SUBMIT') }}
      </button>
    </div>
  </form>
</div>
<div class="back" id="back-pdf">
  <a href="javascript:history.back()">Back</a>
</div>

@endsection