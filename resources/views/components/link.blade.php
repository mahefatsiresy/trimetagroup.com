@props(['href'])

<a
    href="{{'en' === app()->getLocale() ? '/en' : ''}}{{$href}}"
    {{ $attributes(['class' => '']) }}
>
    {{$slot}}
</a>
