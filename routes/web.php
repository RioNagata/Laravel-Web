<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// get functions for all of the pages
Route::get('/', function(){
    $sql = "select * from vehicle";
    $vehicles = DB::select($sql);
    return view('items.main')-> with('vehicles', $vehicles);
});

Route::get('booking', function(){
    $sql = "select * from vehicle, client";
    $vehicles = DB::select($sql);
    return view('items.booking')-> with('vehicles', $vehicles);
});

Route::get('client', function(){
    $sql = "select * from client";
    $clients = DB::select($sql);
    return view('items.client')-> with('clients', $clients);
});

Route::get('additem', function(){
    return view('items.additem');
});


Route::get('vehicle_detail/{vehicle_id}', function($vehicle_id){
    $vehicles = get_item($vehicle_id);
    //dd($vehicle);
    return view('items.vehicle_detail')-> with('vehicles', $vehicles);    
});

Route::get('updateitem/{vehicle_id}', function($vehicle_id){
    $vehicle = get_item($vehicle_id); 
    return view('items.updateitem')-> with('vehicle', $vehicle);
});

//post function for adding, updating, deleting vehicle and add bookings
Route::post('additem', function(){
    $name = request('name');
    $age = request('age');
    $dlnum = request('dlnum');
    $license = request('license');
    $dob = request('dob');
    $id = additem($name, $age, $dlnum, $license, $dob);
    if ($id) {
        return redirect(url("client"));
    }
});

Route::post('updateitem', function(){
    $id = request('id');
    $model = request('model');
    $rego = request('rego');
    $year = request('year');
    $odometer = request('odometer');
    $transmission = request('transmission');
    $update = update_item($id, $model, $rego, $year, $odometer, $transmission);
    if ($update) {
        return redirect(url("vehicle_detail/$id"));
    } else {
        return redirect(url("vehicle_detail/$id"));
    }
});

Route::post('addbooking', function(){
    $startdate = request('startdate');
    $starttime = request('starttime');
    $enddate = request('enddate');
    $endtime = request('endtime');
    $update = add_booking($startdate, $starttime, $enddate, $endtime);
    if ($update) {
        return redirect(url("booking"));
    } else {
        return redirect(url("booking"));
    }
});

Route::post('deleteitem', function(){
    $clientid = request('clientid');
    $delete = delete_item($clientid);
    if ($delete) {
        return redirect(url("client"));
    } else {
        return redirect(url("client"));
    }
});

//all functions 
function update_item($id, $model, $rego, $year, $odometer, $transmission) {
    $sql = "update vehicle set model = ?, rego = ?, year = ?, odometer = ?, transmission = ? where vehicle_id = ?";
    DB::update($sql, array($model, $rego, $year, $odometer, $transmission, $id));
}

function additem($name, $age, $dlnum, $license, $dob){
    $sql = "insert into client values(null, ?, ?, ?, ?, ?)";
    DB::insert($sql, array($name, $age, $dlnum, $license, $dob));
    $id = DB::getPdo()-> lastInsertId();
    return($id);
}

function add_booking($startdate, $starttime, $enddate, $endtime){
    $sql1 = "insert into booking values(null, 4, 6, ?, ?, ?, ?)";
    DB::insert($sql1, array($startdate, $starttime, $enddate, $endtime));
    $id1 = DB::getPdo()-> lastInsertId();
    return($id1);
}

function delete_item($vehicleid) {
    $sql = "delete from client where client_id = ?";
    DB::delete($sql, array($vehicleid));
} 

function get_item($vehicle_id){
    $sql = "select vehicle.vehicle_id, vehicle.model, vehicle.rego, vehicle.year, vehicle.odometer, vehicle.transmission, client.name, client.dlnum, booking.startdate, booking.starttime, booking.enddate, booking.endtime from vehicle, client, booking where vehicle.vehicle_id = booking.vehicle_id and client.client_id = booking.client_id and vehicle.vehicle_id=?";
    $vehicles = DB::select($sql, array($vehicle_id)); 
    //$vehicle = $vehicles[0];
    return $vehicles;
}

