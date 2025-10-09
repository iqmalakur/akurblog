<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin(Request $request)
    {
        if ($request->session()->has('user_id')) {
            return redirect()
                ->route('posts.index');
        }

        $title = 'Login';
        return view('auth.login', compact('title'));
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'email|required',
            'password' => 'required|min:8',
        ]);

        $user = User::where('email', '=', $request->email)->first();

        if (!$user) {
            return back()
                ->with('error', 'username atau password salah')
                ->onlyInput('email');
        }

        if (!Hash::check($request->password, $user->password)) {
            return back()
                ->with('error', 'username atau password salah')
                ->onlyInput('email');
        }

        $request->session()->put('user_id', $user->id);

        return redirect()
            ->route('posts.index')
            ->with('success', 'Berhasil login');
    }

    public function showRegister(Request $request)
    {
        if ($request->session()->has('user_id')) {
            return redirect()
                ->route('posts.index');
        }

        $title = 'Login';
        return view('auth.register', compact('title'));
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'email|required',
            'password' => 'required|min:8',
        ]);

        $user = User::where('email', '=', $request->email)->first();

        if ($user) {
            return back()
                ->with('error', 'email telah digunakan!')
                ->withInput($request->except('password'));
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'email_verified_at' => now(),
        ]);

        return redirect()
            ->route('login.show')
            ->with('success', 'Berhasil membuat akun baru, silakan login kembali');
    }

    public function logout(Request $request)
    {
        $request->session()->remove('user_id');
        return redirect()
            ->route('login.show');
    }
}
