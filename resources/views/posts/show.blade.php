@extends('layouts.index')

@section('content')
<div class="flex justify-center">
  <div class="px-10 my-15 w-[100%] md:w-[750px] lg:w-[900px]">
    <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold mb-5">{{ $post->title }}</h1>
    <h5 class="text-base md:text-lg mb-8 text-gray-400">{{ $post->user->name }} · {{ $post->published_at->format('d-m-Y H:i') }}</h5>
    <p class="text-base md:text-lg">{{ $post->content }}</p>
  </div>
</div>
@endsection
