<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthenticateGuardianController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login-guardian');
    }

    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'phone' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);


        // Pastikan user memiliki role guardian
        if (Auth::attempt(['phone' => $credentials['phone'], 'password' => $credentials['password']])) {
            if (!auth()->user()->getRoleNames()->contains('guardian')) {
                Auth::logout();
                throw ValidationException::withMessages([
                    'phone' => 'Akun ini bukan wali siswa.',
                ]);
            }

            $request->session()->regenerate();

            return redirect()->intended(route('guardian.dashboard'));
        }

        throw ValidationException::withMessages([
            'phone' => 'Nomor telepon atau password salah.',
        ]);
    }
}
