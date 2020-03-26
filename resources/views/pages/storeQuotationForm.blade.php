@extends('layouts.form')

@section('title', 'IWG Communication Rooms Project Survey')


@section('content')

<div class="content">
  <div id="card-contact" class="card text-center">
    <div class="card-body">
      <h5 class="card-title">Submitted!</h5>
      <p class="card-text">SALTO will contact you within the next week to develop the quotation for the whole center and arrange everything</p>
      <a href="{{route('index')}}" class="btn btn-primary">Submit another one</a>
    </div>
    <div class="card-footer text-muted">
      Thank you
    </div>
  </div>
</div>
    
@endsection


