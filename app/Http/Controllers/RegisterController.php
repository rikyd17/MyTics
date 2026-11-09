<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class RegisterController extends Controller
{
        /**
     * Menampilkan form registrasi
     */
    public function showRegistrationForm()
    {
        return view('Auth.register'); // Sesuaikan dengan nama view Anda
    }

    /**
     * Memproses data registrasi
     */
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Auto login setelah registrasi (optional)
        auth()->login($user);

        return redirect('/beranda'); // Redirect ke halaman setelah registrasi
        return redirect()->route('beranda')->with('success', 'Registrasi berhasil!');

    }
}
