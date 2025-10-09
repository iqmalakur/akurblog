@extends('layouts.index')

@section('content')
  <div class="py-16">
    <div class="mx-auto max-w-lg rounded-lg bg-slate-100 p-8 shadow-md">
      <h1 class="mb-5 text-center text-3xl font-bold">Buat Akun</h1>

      @session('error')
        <div class="mb-4 flex items-center rounded-lg bg-red-50 p-4 text-sm text-red-800" role="alert">
          <svg class="me-3 inline h-4 w-4 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
            viewBox="0 0 20 20">
            <path
              d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
          </svg>
          <span class="sr-only">Info</span>
          <div>
            {{ session('error') }}
          </div>
        </div>
      @endsession

      <form action="{{ route('register') }}" method="POST">
        @csrf
        <div class="mb-5">
          <label class="mb-2 block text-sm font-medium text-gray-900">
            Your name
            <input type="text" name="name" value="{{ old('name') }}"
              class="shadow-xs block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
              required />
          </label>
        </div>
        <div class="mb-5">
          <label class="mb-2 block text-sm font-medium text-gray-900">
            Your email
            <input type="email" name="email" value="{{ old('email') }}"
              class="shadow-xs block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
              required />
          </label>
        </div>
        <div class="mb-5">
          <label class="mb-2 block text-sm font-medium text-gray-900">Your
            password
            <input type="password" name="password" minlength="8"
              class="shadow-xs block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
              required />
          </label>
        </div>
        <button type="submit"
          class="cursor-pointer rounded-lg bg-blue-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300">
          Buat Akun
        </button>
      </form>

      <p class="mt-5 text-center text-sm text-gray-700">
        Sudah punya akun?
        <a href="{{ route('login.show') }}" class="font-medium text-blue-600 hover:underline">
          Masuk di sini
        </a>
      </p>

    </div>
  </div>
@endsection
