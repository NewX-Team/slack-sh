<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        // Validasi input
        $request->validate([
            'nik' => 'required|unique:users',
            'nama' => 'required',
        ]);

        // Simpan data pengguna baru
        $user = User::create([
            'nik' => $request->nik,
            'nama' => $request->nama,
        ]);

        // Login otomatis setelah registrasi
        Auth::login($user);

        return redirect()->route('dashboard');
    }

    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'nik' => 'required',
            'nama' => 'required',
        ]);

        // Cek apakah pengguna ada berdasarkan NIK dan Nama
        $user = User::where('nik', $request->nik)
                    ->where('nama', $request->nama)
                    ->first();

        if ($user) {
            Auth::login($user);
            return redirect()->route('dashboard');
        }

        return back()->withErrors(['nik' => 'NIK atau Nama salah']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
