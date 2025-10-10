@extends('layouts.index')

@section('content')
  <div class="relative px-20 py-8">
    <h1 class="mb-5 text-center text-3xl font-bold">Blog Terbaru</h1>

    @foreach ($posts as $post)
      <div class="my-2 w-full rounded-lg border border-gray-200 bg-white p-6 shadow-sm">
        <a href="{{ route('posts.show', $post->id) }}">
          <h5 class="text-2xl font-bold tracking-tight text-gray-900">{{ $post->title }}</h5>
        </a>
        <h6 class="mb-2 font-normal text-gray-600">Oleh {{ $post->user->name }} -
          {{ $post->published_at->format('d-m-Y H:i') }}</h6>
        <p class="mb-3 truncate font-normal text-gray-700">{{ $post->content }}</p>
        <a href="{{ route('posts.show', $post->id) }}"
          class="inline-flex items-center rounded-lg bg-blue-700 px-3 py-2 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300">
          Selengkapnya
          <svg class="ms-2 h-3.5 w-3.5 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
            viewBox="0 0 14 10">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M1 5h12m0 0L9 1m4 4L9 9" />
          </svg>
        </a>
      </div>
    @endforeach

    @session('user_id')
      <a href="{{ route('posts.create') }}"
        class="fixed bottom-5 right-5 mb-2 me-2 cursor-pointer rounded-full bg-blue-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">+
        Buat Post
      </a>
    @endsession
  </div>
@endsection
