<?php 
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Session;
class AuthController extends Controller
{
    public function register()
    {
        return view('register');
    }
    public function actionregister(Request $request)
    {
        // Validasi data input
        

        // Buat user baru
        User::create([
            'name' => $request->input('username'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'password' => Hash::make($request->input('password')),
            'is_admin' => false, // Default untuk user biasa
        ]);
        
        // Redirect setelah berhasil registrasi
        return redirect()->route('register')->with('success', 'Registrasi berhasil, silakan login.');
    }
}

 ?>