@extends('layout.maintenanceLayout')

@section('title')
Utilities
@endsection

@section('content')


  <div class="fixed-action-btn vertical click-to-toggle" style="bottom: 45px; right: 24px;">
    <a class="btn-floating btn-large blue darken-4">
      <i class="material-icons">menu</i>
    </a>
    <ul>
      <li><a class="btn-floating red"><i class="material-icons">insert_chart</i></a></li>
      <li><a class="btn-floating yellow darken-1"><i class="material-icons">format_quote</i></a></li>
      <li><a class="btn-floating green"><i class="material-icons">publish</i></a></li>
      <li><a class="btn-floating blue"><i class="material-icons">attach_file</i></a></li>
    </ul>
  </div>

@stop