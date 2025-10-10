@php
  $links = [['text' => 'Home', 'path' => '/'], ['text' => 'Post', 'path' => route('posts.index')]];
  $user = session('user');
@endphp

<nav class="fixed left-0 right-0 top-0 z-50 border-gray-200 bg-slate-100 px-8 shadow-sm">
  <div class="mx-auto flex max-w-screen-xl flex-wrap items-center justify-between p-4">
    <a href="{{ route('home') }}" class="flex items-center space-x-3 rtl:space-x-reverse">
      <span class="self-center whitespace-nowrap text-2xl font-semibold">AkurBlog</span>
    </a>
    <div class="flex items-center space-x-3 md:order-2 md:space-x-0 rtl:space-x-reverse">
      @session('user')
        <button type="button" class="flex cursor-pointer rounded-full text-sm focus:ring-4 focus:ring-gray-300 md:me-0"
          id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
          <span class="sr-only">Open user menu</span>
          <img class="h-8 w-8 rounded-full" src="{{ asset('images/user.png') }}" alt="user photo">
        </button>
        <div class="z-50 my-4 hidden list-none divide-y divide-gray-100 rounded-lg bg-white text-base shadow-sm"
          id="user-dropdown">
          <div class="px-4 py-3">
            <span class="block text-sm text-gray-900">{{ $user['name'] }}</span>
            <span class="block truncate text-sm text-gray-500">{{ $user['email'] }}</span>
          </div>
          <ul class="py-2" aria-labelledby="user-menu-button">
            {{-- <li>
              <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Sign
                out</a>
            </li> --}}
            <li>
              <form action="{{ route('logout') }}" method="POST" id="logout-form"
                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                @csrf
                @method('DELETE')
                <button id="logout-button" type="submit" class="block w-full cursor-pointer text-start">Logout</button>
              </form>
            </li>
          </ul>
        </div>
      @else
        @if ($title === 'Login')
          <a href="{{ route('login.show') }}"
            class="block rounded-sm bg-blue-700 px-3 py-2 font-semibold text-white md:bg-transparent md:p-0 md:text-blue-700"
            aria-current="page">Login</a>
        @else
          <a href="{{ route('login.show') }}"
            class="block rounded-sm px-3 py-2 font-semibold text-gray-900 hover:bg-gray-100 md:border-0 md:p-0 md:hover:bg-transparent md:hover:text-blue-700">Login</a>
        @endif
      @endsession
      <button data-collapse-toggle="navbar-user" type="button"
        class="inline-flex h-10 w-10 items-center justify-center rounded-lg p-2 text-sm text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 md:hidden"
        aria-controls="navbar-user" aria-expanded="false">
        <span class="sr-only">Open main menu</span>
        <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M1 1h15M1 7h15M1 13h15" />
        </svg>
      </button>
    </div>
    <div class="hidden w-full items-center justify-between md:order-1 md:flex md:w-auto" id="navbar-user">
      <ul
        class="mt-4 flex flex-col rounded-lg border border-gray-100 p-4 font-medium md:mt-0 md:flex-row md:space-x-8 md:border-0 md:p-0 rtl:space-x-reverse">
        @foreach ($links as $link)
          <x-navlink text="{{ $link['text'] }}" path="{{ $link['path'] }}" title="{{ $title }}"></x-navlink>
        @endforeach
      </ul>
    </div>
  </div>
</nav>

<div class="h-[60px] w-full"></div>
