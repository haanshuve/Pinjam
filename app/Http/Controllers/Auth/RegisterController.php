<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function showRegisterForm()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'nip' => 'required|string|max:20|unique:users',
            'role' => 'required|in:admin,peminjam',
            'password' => 'required|string|min:6|confirmed',
            'jabatan' => 'nullable|string|max:255',
            'departemen' => 'nullable|string|max:255',
            'foto_ktp' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Upload Foto KTP (jika ada)
        $foto_ktp = null;
        if ($request->hasFile('foto_ktp')) {
            $foto_ktp = $request->file('foto_ktp')->store('uploads/ktp', 'public');
        }

        // Simpan data pengguna
        User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'nip' => $request->nip,
            'role' => $request->role,
            'password' => Hash::make($request->password),
            'jabatan' => $request->role === 'peminjam' ? $request->jabatan : null,
            'departemen' => $request->role === 'peminjam' ? $request->departemen : null,
            'foto_ktp' => $foto_ktp,
        ]);

        return redirect()->route('login')->with('success', 'Registrasi berhasil! Silakan login.');
    }
}
