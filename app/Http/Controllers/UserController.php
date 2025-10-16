<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $title = 'User Profile';
        $userId = $request->session()->get('user_id');

        if (!$userId) {
            return redirect()->route('login.show');
        }

        $user = User::find($userId);
        $posts = Post::where('user_id', $userId)->get();

        return view('users.index', compact('title', 'user', 'posts'));
    }
}
