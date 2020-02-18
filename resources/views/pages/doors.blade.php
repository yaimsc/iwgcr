@extends('layouts.form')

@section('title', 'Regus Survey')

@section('content')

<div class="doors-content">
  <form method="POST">
    @csrf
    <div class="form">
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
      <div class="card">
        <label class="title">Interior Photo</label>
        <input class="form-control"  type="file" name="interior"/>
      </div>
      <div class="card">
        <label class="title">Front Photo</label>
        <input class="form-control" type="file" name="front"/>
      </div>
      <div class="card">
        <label class="title">Exterior Photo</label>
        <input class="form-control" type="file" name="exterior"/>
      </div>
    </div>
    <div class="card">
      <div class="card-header">
        <h5 class="title">Cylinder Specifications</h5>
      </div>
      <div class="form-group">
        <label class="bmd-label-floating">Cylinder Name</label>
        <input class="form-control" name="name" required/>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label class="bmd-label-floating">Exterior Length</label>
          <input class="form-control" type="number" name="ext_length" placeholder="Exterior Length (mm)" required/>
        </div>
        <div class="form-group col-md-6">
          <label class="bmd-label-floating">Interior Length</label>
          <input class="form-control" type="number" name="int_length" placeholder="Interior Length (mm)" required/>
        </div>
      </div>
      <div class="checkbox">
        <label>
          <input type="checkbox" name="check">Distance from Knobs Centre to Frame OK
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
    