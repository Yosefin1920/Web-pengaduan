<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function loginForm()
    {
        return view('auth.login');
    }

    public function registerForm()
    {
        return view('auth.register');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
        if (Auth::attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();
            return redirect()->route('pengaduan.home')->with('success', 'Login berhasil!');
        }

        return back()->with(['error' => 'Email atau password salah!']);
    }

    public function register(Request $request)
    {
        try {
            $validated = $request->validate([
                'nama' => 'required|string|max:255',
                'nik' => 'required|string|size:16|unique:users,nik',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:6|confirmed',
                'kode_pos' => 'required|string|max:10',
                'provinsi' => 'required|string|max:255',
                'kota' => 'required|string|max:255',
                'no_telp' => 'required|string|max:15',
                'kecamatan' => 'required|string|max:255',
                'tempat_lahir' => 'required|string|max:255',
                'kelurahan' => 'required|string|max:255',
                'tanggal_lahir' => 'required|date',
                'agama' => 'required|string|max:50',
                'jenis_kelamin' => 'required|in:laki-laki,perempuan',
                'status' => 'required|string|max:50',
                'alamat' => 'required|string|max:500',
            ]);

            User::create([
                'nama' => $validated['nama'],
                'nik' => $validated['nik'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
                'kode_pos' => $validated['kode_pos'],
                'provinsi' => $validated['provinsi'],
                'kota' => $validated['kota'],
                'no_telp' => $validated['no_telp'],
                'kecamatan' => $validated['kecamatan'],
                'tempat_lahir' => $validated['tempat_lahir'],
                'kelurahan' => $validated['kelurahan'],
                'tanggal_lahir' => $validated['tanggal_lahir'],
                'agama' => $validated['agama'],
                'jenis_kelamin' => $validated['jenis_kelamin'],
                'status' => $validated['status'],
                'alamat' => $validated['alamat'],
            ]);

            return redirect('/login')->with('success', 'Pendaftaran berhasil! Silakan login.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput($request->except(['password', 'password_confirmation']))
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login')->with('success', 'Logout berhasil!');
    }
}
