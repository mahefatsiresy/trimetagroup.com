@props(['href', 'secondary' => false])
<a
    href="{{'en' === app()->getLocale() ? '/en' : ''}}{{$href}}"
    {{ $attributes(['class' => 'px-4 py-2 inline-block w-fit font-semibold text-neutral-900 border border-neutral-50 bg-neutral-50 hover:bg-neutral-900 hover:text-neutral-50 ' . ($secondary ? ' text-white bg-transparent border border-neutral-400 hover:text-white' : '')]) }}
>{{ $slot }}</a>
