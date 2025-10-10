@extends('layouts.index')

@section('content')
  <div class="py-8">
    <div class="mx-auto max-w-lg rounded-lg bg-slate-100 p-8 shadow-md">
      <h1 class="mb-5 text-center text-3xl font-bold">Edit Postingan</h1>

      <form action="{{ route('posts.update', $post->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-5">
          <label class="mb-2 block text-sm font-medium text-gray-900">
            Judul
            <input type="text" name="title" value="{{ old('title', $post->title) }}"
              class="shadow-xs block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
              required />
          </label>
          @error('title')
            <div class="mb-4 rounded-lg bg-red-50 p-4 text-sm text-red-800" role="alert">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="mb-5">
          <label class="mb-2 block text-sm font-medium text-gray-900">
            Slug
            <input type="text" name="slug" value="{{ old('slug', $post->slug) }}"
              class="shadow-xs block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
              required />
          </label>
          @error('slug')
            <div class="mb-4 rounded-lg bg-red-50 p-4 text-sm text-red-800" role="alert">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="mb-5">
          <label class="mb-2 block text-sm font-medium text-gray-900">
            Kategori
            <select name="category_id"
              class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500">
              <option value="">-- Pilih kategori --</option>
              @foreach ($categories as $category)
                <option value="{{ $category->id }}"
                  {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}>
                  {{ $category->name }}</option>
              @endforeach
            </select>
          </label>
          @error('category_id')
            <div class="mb-4 rounded-lg bg-red-50 p-4 text-sm text-red-800" role="alert">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="mb-5">
          <label class="mb-2 block text-sm font-medium text-gray-900">
            Konten
            <textarea rows="4" name="content"
              class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
              placeholder="Tuliskan konten disini...">{{ old('content', $post->content) }}</textarea>
          </label>
          @error('content')
            <div class="mb-4 rounded-lg bg-red-50 p-4 text-sm text-red-800" role="alert">
              {{ $message }}
            </div>
          @enderror
        </div>
        <button type="submit"
          class="cursor-pointer rounded-lg bg-blue-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300">
          Edit Postingan
        </button>
      </form>

    </div>
  </div>
@endsection
