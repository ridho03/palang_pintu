<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VehicleOwner extends Model
{
    protected $table = 'vehicleowner';
    protected $fillable = [
        'name', 
        'contactInformation'
    ]; // Nama tabel di database
}
