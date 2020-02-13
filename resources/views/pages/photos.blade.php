@extends('layouts.form')

@section('title', 'Regus Survey')

@section('content')

<div class="photos-content">
  <div id="photo">
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
      <input class="form-control" name="name" placeholder="Cylinder Name"/>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label class="bmd-label-floating">Exterior Length</label>
        <input class="form-control" name="name" placeholder="Exterior Length (mm)"/>
      </div>
      <div class="form-group col-md-6">
        <label class="bmd-label-floating">Interior Length</label>
        <input class="form-control" name="name" placeholder="Interior Length (mm)"/>
      </div>
    </div>
   
  </div>
</div>
    
@endsection
    