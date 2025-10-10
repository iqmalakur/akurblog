<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $title = 'coba';
        $posts = Post::whereNotNull('published_at')->orderByDesc('published_at')->get();
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $categories = Category::all();

        if (!$request->session()->has('user_id')) {
            return redirect()
                ->route('posts.index');
        }

        return view('posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (!$request->session()->has('user_id')) {
            return redirect()
                ->route('posts.index');
        }

        $request->validate([
            'title' => 'required|min:5',
            'slug' => 'required|min:5',
            'category_id' => 'required',
            'content' => 'required|min:10',
        ]);
        $userId = $request->session()->get('user_id');

        Post::create([
            'title' => $request->title,
            'slug' => $request->slug,
            'category_id' => $request->category_id,
            'content' => $request->content,
            'user_id' => $userId,
        ]);

        return redirect()
            ->route('posts.index')
            ->with('success', 'Berhasil membuat post baru!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::find($id);
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::find($id);
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([]);
        // Post::update($id);

        return redirect()
            ->route('posts.index')
            ->with('success', 'Berhasil update post!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::find($id);
        $post->delete();

        return redirect()
            ->route('posts.index')
            ->with('success', 'Berhasil menghapus post!');
    }
}
