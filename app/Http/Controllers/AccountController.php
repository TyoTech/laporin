<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class AccountController extends Controller
{
    public function index()
    {
        return view('account');
    }

    public function updateProfil(Request $request)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . auth()->id(),
            'alamat' => 'nullable|string|max:255',
            'no_hp' => 'nullable|string|max:15',
        ]);

        auth()->user()->update([
            'name'   => $request->name,
            'email'  => $request->email,
            'alamat' => $request->alamat,
            'no_hp'  => $request->no_hp,
        ]);

        return back()->with('success_profil', 'Profil berhasil diperbarui!');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'password_lama'         => 'required',
            'password'              => ['required', 'min:6', 'confirmed'],
        ]);

        if (!Hash::check($request->password_lama, auth()->user()->password)) {
            return back()->withErrors(['password_lama' => 'Password lama tidak sesuai.'])->with('tab', 'password');
        }

        auth()->user()->update([
            'password' => Hash::make($request->password),
        ]);

        return back()->with('success_password', 'Password berhasil diperbarui!');
    }
}