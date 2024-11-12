<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
        'is_admin', // Pastikan kolom is_admin termasuk dalam fillable
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public $timestamps = true; // Secara default diaktifkan, tetapi tambahkan ini jika tidak ada

    protected $casts = [
        'email_verified_at' => 'datetime',
        'is_admin' => 'boolean', // Mengatur is_admin sebagai boolean
    ];
}



?>