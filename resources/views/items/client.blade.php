@extends('layout/master')

@section('title')
  Clients
@endsection

@section('content')
  <h1>Clients</h1>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">Name</th>
        <th scope="col">Age</th>
        <th scope="col">Driver`s License</th>
        <th scope="col">License Type</th>
        <th scope="col">Date Of Birth</th>
      </tr>
    </thead>
    <?php //foreach loop to show all clients?>
    @foreach($clients as $client)
    <tbody>
      <tr>
        <td>{{$client->name}}</td>
        <td>{{$client->age}}</td>
        <td>{{$client->dlnum}}</td>
        <td>{{$client->license}}</td>
        <td>{{$client->dob}}</td>
        <td>
          <?php //form(only button) for deleting the client?>
          <form method="post" action="{{url("deleteitem")}}">
            {{csrf_field()}}
            <input type="hidden" name="clientid" value="{{$client->client_id}}">
            <input class="btn btn-primary" type="submit" value="Remove Client">
          </form>
        </td>
      </tr>
    </tbody>
    @endforeach 
  </table>
@endsection