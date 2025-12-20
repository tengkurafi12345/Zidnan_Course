<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;

class PasswordController extends Controller
{
     /**
     * Update the user's password.
     */
    public function update(Request $request): RedirectResponse
    {
        try {
            $validated = $request->validate([
                'current_password' => ['required', 'current_password'],
                'password' => ['required', Password::defaults(), 'confirmed'],
            ]);

            $request->user()->update([
                'password' => Hash::make($validated['password']),
            ]);

            return back()->with('success', 'Password berhasil diperbarui.');

        } catch (ValidationException $e) {
            return back()
                ->withErrors($e->errors())
                ->with('error', 'Gagal memperbarui password. Pastikan password lama benar.');
        }
    }
}
