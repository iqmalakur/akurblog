@php
  $links = [['text' => 'Home', 'path' => '/'], ['text' => 'Post', 'path' => route('posts.index')]];
@endphp

<nav class="fixed left-0 right-0 top-0 z-50 border-gray-200 bg-slate-100 px-8 shadow-sm">
  <div class="mx-auto flex max-w-screen-xl flex-wrap items-center justify-between p-4">
    <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
      <span class="self-center whitespace-nowrap text-2xl font-semibold">AkurBlog</span>
    </a>
    <button data-collapse-toggle="navbar-default" type="button"
      class="inline-flex h-10 w-10 items-center justify-center rounded-lg p-2 text-sm text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 md:hidden"
      aria-controls="navbar-default" aria-expanded="false">
      <span class="sr-only">Open main menu</span>
      <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
          d="M1 1h15M1 7h15M1 13h15" />
      </svg>
    </button>
    <div class="hidden w-full md:block md:w-auto" id="navbar-default">
      <ul
        class="mt-4 flex flex-col rounded-lg border border-gray-100 p-4 font-medium md:mt-0 md:flex-row md:space-x-8 md:border-0 md:p-0 rtl:space-x-reverse">
        @foreach ($links as $link)
          <x-navlink text="{{ $link['text'] }}" path="{{ $link['path'] }}" title="{{ $title }}"></x-navlink>
        @endforeach

        @session('user_id')
        <x-navlink text="Profile" path="/user" title="{{ $title }}"></x-navlink>

        <form action="{{ route('logout') }}" method="POST" id="logout-form">
          @csrf
          @method('DELETE')
          <button
            class="block cursor-pointer rounded-sm px-3 py-2 text-gray-900 hover:bg-gray-100 md:border-0 md:p-0 md:hover:bg-transparent md:hover:text-blue-700"
            id="logout-button" type="submit">Logout</button>
        </form>
      @else
        <x-navlink text="Login" path="{{ route('login.show') }}" title="{{ $title }}"></x-navlink>
        @endif
      </ul>
    </div>
  </div>
</nav>
<div class="h-[60px] w-full"></div>
