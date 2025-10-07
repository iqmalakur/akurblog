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
}
