@extends('layouts.form')

@section('title', 'Regus Survey')

@section('content')

<section>
<div class="row">
  @foreach ($centres as $centre)
    <h2 class="title-white">Centre - {{$centre->name}}</h2>
  @endforeach
</div>
<div class="doors-content">
  <form method="POST" action="{{route('door.store')}}" enctype="multipart/form-data">
    @csrf
    <div class="doors">
    <div id="photo">
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
      <div class="card">
        <label class="title">IQ Placement Photo</label>
        <input class="form-control" type="file" name="placement_photo"/>
      </div>
    </div>
    <div class="card">
      <div class="card-header">
        <h5 class="title">Cylinder Specifications</h5>
      </div>
      <div class="form-group">
        <label class="bmd-label-floating">Coomunication Rooms Door Name</label>
        <input class="form-control" name="door_name" required/>
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
</section>
    
@endsection
    