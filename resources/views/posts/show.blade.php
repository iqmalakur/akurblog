@extends('layouts.index')

@section('content')
  <div class="flex justify-center">
    <div class="my-15 w-[100%] px-10 md:w-[750px] lg:w-[900px]">
      <h1 class="mb-5 text-3xl font-bold md:text-4xl lg:text-5xl">{{ $post->title }}</h1>
      <h5 class="mb-8 text-base text-gray-400 md:text-lg">{{ $post->user->name }} ·
        {{ $post->published_at->format('d-m-Y H:i') }}</h5>
      <p class="text-base md:text-lg">{{ $post->content }}</p>
    </div>
  </div>
@endsection
