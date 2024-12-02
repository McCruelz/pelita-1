<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        try {
            // Validasi input
            $request->validate([
                'name' => ['required', 'string', 'max:255', 'regex:/^[a-zA-Z]+$/'],
                'username' => ['required', 'string', 'max:255', 'regex:/^[a-zA-Z0-9]+$/', 'unique:users'],
                'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
                'phone_number' => ['nullable', 'string', 'max:15'], // Validasi untuk nomor telepon
                'gender' => ['nullable', 'in:male,female'], // Validasi untuk gender
                'address' => ['nullable', 'string', 'max:255'], // Validasi untuk alamat
            ]);
    
            // Buat user baru
            $user = User::create([
                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'phone_number' => $request->phone_number,
                'gender' => $request->gender,
                'address' => $request->address,
            ]);
    
            event(new Registered($user));
    
            Auth::login($user);
    
            return redirect(route('home', absolute: false));
    
        } catch (\Exception $e) {
            // Tangkap error dan tampilkan pesan error
            return redirect()->route('register')
                             ->withErrors(['registration' => 'Terjadi kesalahan saat mendaftar. Silakan coba lagi.'])
                             ->withInput(); // Redirect kembali ke halaman pendaftaran dengan error
        }
    }
    
}
