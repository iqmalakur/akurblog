@extends('layouts.index')

@section('content')
  <div class="flex justify-center">
    <div class="my-15 w-[100%] px-10 md:w-[750px] lg:w-[900px]">
      @if ($userId === $post->user->id)
        <div class="flex">
          <a href="{{ route('posts.edit', $post->id) }}"
            class="mb-2 me-2 rounded-lg bg-green-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300">Edit</a>
          <form id="delete-post-form" action="{{ route('posts.destroy', $post->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" id="delete-post-button"
              class="mb-2 me-2 cursor-pointer rounded-lg bg-red-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300">Hapus</button>
          </form>
        </div>
      @endif
      <h1 class="mb-5 text-3xl font-bold md:text-4xl lg:text-5xl">{{ $post->title }}</h1>
      <h5 class="mb-1 text-base font-bold text-gray-400 md:text-lg">{{ $post->category->name }}</h5>
      <h5 class="mb-8 text-base text-gray-400 md:text-lg">{{ $post->user->name }} ·
        {{ $post->published_at?->format('d-m-Y H:i') ?? 'Draft' }}</h5>
      <p class="text-base md:text-lg">{{ $post->content }}</p>
    </div>
  </div>
@endsection
