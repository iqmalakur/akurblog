@extends('layouts.index')

@section('content')
  <section class="bg-slate-200 py-20">
    <div class="container mx-auto px-6 text-center">
      <h1 class="mb-4 text-4xl font-bold md:text-6xl">Selamat Datang di AkurBlog</h1>
      <p class="mb-6 text-lg md:text-xl">Temukan berbagai artikel menarik seputar teknologi, gaya hidup, dan inspirasi.</p>
      <a href="{{ route('posts.index') }}"
        class="mb-2 me-2 rounded-lg bg-blue-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300">
        Mulai Membaca
      </a>
    </div>
  </section>

  <section class="bg-gray-50 py-16">
    <div class="container mx-auto px-6 text-center">
      <h2 class="mb-6 text-3xl font-bold text-gray-800">Tentang Blog Ini</h2>
      <p class="mx-auto max-w-2xl text-gray-600">
        Blog ini dibuat untuk berbagi wawasan, pengalaman, dan informasi terkini dari berbagai bidang.
        Kami percaya bahwa pengetahuan harus dibagikan dengan cara yang sederhana dan menarik.
      </p>
    </div>
  </section>

  <section class="py-16 text-center">
    <div class="container mx-auto px-6">
      <h2 class="mb-4 text-3xl font-bold">Ingin Berkontribusi?</h2>
      <p class="mb-6 text-lg">Kamu juga bisa menjadi penulis di blog ini dan berbagi ide menarik dengan dunia.</p>
      <a href="{{ route('register') }}"
        class="mb-2 me-2 rounded-lg bg-blue-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300">
        Daftar Sekarang
      </a>
    </div>
  </section>
@endsection
