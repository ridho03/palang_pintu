<?php

namespace App\Http\Controllers;

use App\Models\VehicleOwner;
use Illuminate\Http\Request;

class VehicleOwnerController extends Controller
{
    public function index()
    {
        // Mengambil semua data dari tabel vehicleowner
        $allData = VehicleOwner::all();

        // Mengembalikan data dalam format JSON (untuk testing)
        return response()->json($allData);
    }
}
?>