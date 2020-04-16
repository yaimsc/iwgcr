@extends('layouts.form')

@section('title', 'IWG Communication Rooms Project Survey')

@section('content')

<section>
<div class="row">
  @foreach ($centres as $centre)
    <h2 class="title-white">Centre - {{$centre->name}}</h2>
  @endforeach
</div>
<div class="doors-content">
  <form method="POST" id="form-doors" action="{{route('door.store')}}" enctype="multipart/form-data">
    @csrf
    <div class="doors">
    <div id="photo">
      <select class="form-control" name="centre_name" id="centre_name" hidden>
        {{-- <option value="" hidden disabled selected class="placeholder">Select Centre</option> --}}
          @foreach ($centres as $centre)
            <option selected value="{{$centre->name}}">{{$centre->name}}</option>
          @endforeach
      </select>
      <select class="form-control" name="country" id="country" hidden>
        {{-- <option value="" hidden disabled selected class="placeholder">Select Centre</option> --}}
          @foreach ($countries as $country)
            <option selected value="{{$country->name}}">{{$country->name}}</option>
          @endforeach
      </select>
      <div class="card">
        <label class="title">Interior Photo</label>
        <input class="form-control @error('interior_photo') is-invalid @enderror"  type="file" name="interior_photo" value="{{ old('interior_photo') }}" required/>
        @error('interior_photo')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>
      <div class="card">
        <label class="title">Front Photo</label>
        <input class="form-control @error('front_photo') is-invalid @enderror" type="file" name="front_photo" value="{{ old('front_photo') }}" required />
        @error('front_photo')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>
      <div class="card">
        <label class="title">Exterior Photo</label>
        <input class="form-control @error('exterior_photo') is-invalid @enderror" type="file" name="exterior_photo" value="{{ old('exterior_photo') }}" required />
        @error('exterior_photo')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>
      <div class="card">
        <label class="title">IQ Placement Photo</label>
        <input class="form-control @error('placement_photo') is-invalid @enderror" type="file" name="placement_photo" value="{{ old('placement_photo') }}" required/>
        @error('placement_photo')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>
      <div class="card">
        <label class="title">IQ Placement Photo (optional)</label>
        <input class="form-control @error('placement_photo_optional') is-invalid @enderror" type="file" name="placement_photo_optional" value="{{ old('placement_photo_optional') }}"/>
        @error('placement_photo_optional')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>
    </div>
    <div class="card">
      <div class="card-header">
        <h5 class="title">Cylinder Specifications</h5>
      </div>
      <div class="form-group">
        <label class="bmd-label-floating">Comunication Rooms Door Name</label>
        <input class="form-control @error('door_name') is-invalid @enderror" name="door_name" value="{{ old('door_name') }}"required/>
        @error('door_name')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>
      <div class="form-row">
        <div class="form-group col-md-5">
          <input class="form-control @error('exterior_length') is-invalid @enderror" type="number" name="exterior_length" value="{{ old('exterior_length') }}" placeholder="Exterior Length" required/>
          @error('exterior_length')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        <div class="form-group col-md-5">
          <input class="form-control @error('interior_length') is-invalid @enderror" type="number" name="interior_length" value="{{ old('interior_length') }}" placeholder="Interior Length" required/>
          @error('interior_length')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        <div class="form-group col-md-2">
          <select class="form-control" name="type_length" id="type_length" required>
            <option value="mm" selected class="placeholder">mm</option>
            <option value="inches">inches</option>
          </select>
        </div>
      </div>
      <div class="form-group">
        <p>Confirmation Distance from Knob's centre to Frame is OK</p>
        <select class="form-control col-md-4 @error('distance_knobs_frame_ok') is-invalid @enderror" name="distance_knobs_frame_ok" value="{{ old('distance_knobs_frame_ok') }}" required>
          <option value="1">YES</option>
          <option value="0">NO</option>
        </select>
      </div>
      {{-- <div class="checkbox">
        <label>
          <input type="checkbox" name="distance_knobs_frame_ok">Confirmation Distance from Knob's centre to Frame is OK
        </label>
      </div> --}}
    </div>
  </div>
    <div class="card">
      <div class="form-group">
        <p>Does the General Manager want to receive from SALTO a quotation for equipping the whole center?</p>
        <select class="form-control col-md-4 @error('quotation') is-invalid @enderror" name="quotation" value="{{ old('quotation') }}" required>
          <option value="1">YES</option>
          <option value="0">NO</option>
        </select>
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
</section>
    
@endsection
    