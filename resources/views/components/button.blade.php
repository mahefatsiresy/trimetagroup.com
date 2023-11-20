@props(['href', 'secondary' => false])
<a {{ $attributes(['class' => 'px-4 py-2 inline-block w-fit font-semibold text-gray-900 border border-gray-50 bg-gray-50 hover:bg-gray-900 hover:text-gray-50 ' . ($secondary ? ' text-white bg-transparent border border-gray-900 hover:text-white' : '')]) }}
    href="{{ $href }}">{{ $slot }}</a>
