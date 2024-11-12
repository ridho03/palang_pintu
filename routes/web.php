<?php

use App\Models\Query;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Arr;
use App\Http\Controllers\VehicleOwnerController;
use App\Models\VehicleOwner;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
Route::get('/', function () {
    return view('welcome');
});
Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('register/action', [AuthController::class, 'actionregister'])->name('actionregister');

Route::get('login', [LoginController::class, 'login'])->name('login');
Route::post('actionlogin', [LoginController::class, 'actionlogin'])->name('actionlogin');

Route::get('templete', [HomeController::class, 'index'])->name('templete')->middleware('auth');
Route::get('actionlogout', [LoginController::class, 'actionlogout'])->name('actionlogout')->middleware('auth');

Route::get('/vehicleowners', [VehicleOwnerController::class, 'index']);
Route::get('/templete', function () {
    return view('templete', [
        'content' => 'content', // Ubah menjadi 'vehicle' atau nilai lain sesuai kebutuhan
    ]);
});
Route::get('/list_vehicle', function (VehicleOwner $vehicle) {
  
   
    return view('templete', [
        'content' => 'list_vehicle','data'=>json_encode('')// Ubah menjadi 'vehicle' atau nilai lain sesuai kebutuhan
    ]);
});
Route::get('/add_vehicle', function (VehicleOwner $vehicle) {
  
   
    return view('templete', [
        'content' => 'add_vehicle','data'=>json_encode('')// Ubah menjadi 'vehicle' atau nilai lain sesuai kebutuhan
    ]);
});
Route::get('/percobaan/{vehicle}', function (VehicleOwner $vehicle) {
  
   
    return view('templete', [
        'content' => 'percobaan', 'data' => json_encode($vehicle)// Ubah menjadi 'vehicle' atau nilai lain sesuai kebutuhan
    ]);
});
Route::get('/login', function () {
  
   
    return view('login', [
        'content' => 'percobaan'// Ubah menjadi 'vehicle' atau nilai lain sesuai kebutuhan
    ]);
});

// Route untuk menampilkan form register
