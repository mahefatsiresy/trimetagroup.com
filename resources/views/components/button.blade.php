@props(['href', 'secondary' => false])
<a {{ $attributes(['class' => 'px-4 py-2 inline-block bg-green-700 text-white rounded-md w-fit hover:bg-green-600' . ($secondary ? ' text-green-600 bg-transparent border border-green-600 hover:text-white' : '')]) }}
    href="{{ $href }}">{{ $slot }}</a>
