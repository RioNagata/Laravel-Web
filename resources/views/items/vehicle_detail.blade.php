@extends('layout/master')

@section('title')
  Vehicle
@endsection

@section('content')
<div class="center">
  <?php //displays all information of vehicle chosen from main menu?>
  <h1>Vehicle Information</h1>
    <p>Model: {{$vehicles[0]->model}}</p>
    <p>Rego: {{$vehicles[0]->rego}}</p>
    <p>Year: {{$vehicles[0]->year}}</p>      
    <p>Odometer: {{$vehicles[0]->odometer}}</p>
    <p>Transmission: {{$vehicles[0]->transmission}}</p>
    <p><a href="/updateitem/{{$vehicles[0]->vehicle_id}}">Update Vehicle</a><p>   
    <br>
    <?php //foreach loop to display booking details for the car?>
    <h1>Booking list</h1>
    <table class="table">
    <thead>
      <tr>
        <th scope="col">Client Name</th>
        <th scope="col">License Type</th>
        <th scope="col">Start Date</th>
        <th scope="col">Start Type</th>
        <th scope="col">End Date</th>
        <th scope="col">End Type</th>
      </tr>
    </thead>
    @foreach($vehicles as $vehicle)
    <tbody>
      <tr>
        <td>{{$vehicle->name}}</td>
        <td>{{$vehicle->dlnum}}</td>
        <td>{{$vehicle->startdate}}</td>
        <td>{{$vehicle->starttime}}</td>
        <td>{{$vehicle->enddate}}</td>
        <td>{{$vehicle->endtime}}</td>
      </tr>
    </tbody>
    @endforeach 
</div> 
@endsection 