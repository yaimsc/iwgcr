@extends('layouts.form')

@section('title', 'Regus Survey')

@section('content')

<div class="doors-content">
<form method="POST" action="{{route('door.store')}}" enctype="multipart/form-data">
    @csrf
    <div class="doors">
    <div id="photo">
      <div class="card">
        <label class="title">CENTRE NAME</label>
        {{-- <div class="form-group"> --}}
          <select class="form-control" name="centre_name" id="centre">
            {{-- <option value="" hidden disabled selected class="placeholder">Select Centre</option> --}}
              @foreach ($centres as $centre)
                <option selected value="{{$centre->name}}">{{$centre->name}}</option>
              @endforeach
          </select>
        {{-- </div>  --}}
      </div>
      <select class="form-control" name="country" id="country" hidden>
        {{-- <option value="" hidden disabled selected class="placeholder">Select Centre</option> --}}
          @foreach ($countries as $country)
            <option selected value="{{$country->name}}">{{$country->name}}</option>
          @endforeach
      </select>
      <div class="card">
        <label class="title">Interior Photo</label>
        <input class="form-control"  type="file" name="interior_photo"/>
      </div>
      <div class="card">
        <label class="title">Front Photo</label>
        <input class="form-control" type="file" name="front_photo"/>
      </div>
      <div class="card">
        <label class="title">Exterior Photo</label>
        <input class="form-control" type="file" name="exterior_photo"/>
      </div>
    </div>
    <div class="card">
      <div class="card-header">
        <h5 class="title">Cylinder Specifications</h5>
      </div>
      <div class="form-group">
        <label class="bmd-label-floating">Cylinder Name</label>
        <input class="form-control" name="cylinder_name" required/>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label class="bmd-label-floating">Exterior Length</label>
          <input class="form-control" type="number" name="exterior_length" placeholder="Exterior Length (mm)" required/>
        </div>
        <div class="form-group col-md-6">
          <label class="bmd-label-floating">Interior Length</label>
          <input class="form-control" type="number" name="interior_length" placeholder="Interior Length (mm)" required/>
        </div>
      </div>
      <div class="checkbox">
        <label>
          <input type="checkbox" name="distance_knobs_frame_ok">Distance from Knobs Centre to Frame OK
        </label>
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
    
@endsection
    