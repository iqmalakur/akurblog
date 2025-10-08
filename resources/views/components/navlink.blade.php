@if ($text === $title)
  <li>
    <a href="{{ $path }}"
      class="block rounded-sm bg-blue-700 px-3 py-2 text-white md:bg-transparent md:p-0 md:text-blue-700"
      aria-current="page">{{ $text }}</a>
  </li>
@else
  <li>
    <a href="{{ $path }}"
      class="block rounded-sm px-3 py-2 text-gray-900 hover:bg-gray-100 md:border-0 md:p-0 md:hover:bg-transparent md:hover:text-blue-700">{{ $text }}</a>
  </li>
@endif
