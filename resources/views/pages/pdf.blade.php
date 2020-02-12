@extends('layouts.form')

@section('title', 'Regus Survey')

@section('content')

<div id="pdf-content">
  <div id="pdf-title">
    <h3>Download the PDF and follow the details</h3>
  </div>
  <div id="pdf-icon">
    <a href="/download/REGUS_Survey_Comms_Rooms.pdf"><img id="pdf" src="img/icon_pdf.png" alt="Regus Survey Requirements"></a>
  </div>
  <div id="pdf-button">
    <button class="btn-light">
      {{ __('NEXT') }}
    </button>
  </div>
</div>
    
@endsection