@extends('layouts.index')

@section('content')
  <div class="flex justify-center">
    <div class="max-w-[90%] py-10 md:max-w-[700px] lg:max-w-[900px]">
      <div class="mb-8 text-center">
        <h1 class="mb-3 text-5xl font-bold">{{ $user->name }}</h1>
        <h3 class="text-xl text-slate-500">{{ $user->email }}</h3>
      </div>

      <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-left text-sm text-gray-500 rtl:text-right">
          <thead class="bg-gray-50 text-xs uppercase text-gray-700">
            <tr>
              <th scope="col" class="px-6 py-3">
                Judul
              </th>
              <th scope="col" class="px-6 py-3">
                Kategori
              </th>
              <th scope="col" class="px-6 py-3">
                Waktu Publish
              </th>
              <th scope="col" class="px-6 py-3">
                Aksi
              </th>
            </tr>
          </thead>
          <tbody>
            @foreach ($posts as $post)
              <tr class="border-b border-gray-200 odd:bg-white even:bg-gray-50">
                <th scope="row" class="whitespace-nowrap px-6 py-4 font-medium text-gray-900">
                  {{ $post->title }}
                </th>
                <td class="px-6 py-4">
                  {{ $post->category->name }}
                </td>
                <td class="px-6 py-4">
                  {{ $post->published_at?->format('d-m-Y H:i') ?? 'Draft' }}
                </td>
                <td class="px-6 py-4">
                  <a href="{{ route('posts.show', $post->id) }}"
                    class="mb-2 me-2 rounded-full bg-blue-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300">
                    Lihat
                  </a>
                  <form action="" class="inline-block">
                    <button type="submit" {{ $post->published_at ? '' : 'disabled' }}
                      class="mb-2 me-2 cursor-pointer rounded-full bg-green-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 disabled:cursor-not-allowed disabled:bg-gray-800 disabled:text-gray-300">
                      Publish
                    </button>
                  </form>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection
