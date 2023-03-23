@extends('layout/master')

@section('title')
  Home
@endsection

@section('content')
<div class="center">
  <h1>Vehicle Info</h1>
  <?php //Foreeach loop to list all vehicles by rego?>
    @foreach($vehicles as $vehicle)
      <p><a href="vehicle_detail/{{$vehicle->vehicle_id}}">{{$vehicle->model}}</a></p>
    @endforeach 
</div>
@endsection 