@props(['index', 'image', 'dark' => false, 'motionSm' => false])

@php
    $classes = 'flex flex-col md:flex-row gap-6 w-full min-h-[360px] ' . ($dark ? 'from-gray-950 to-gray-900 ' : 'bg-gray-100 ') . (0 !== $index % 2 ? 'bg-gradient-to-tl md:flex-row' : 'bg-gradient-to-tr md:flex-row-reverse');
@endphp

<div class="{{ $classes }}">
    <div class="pl-4 md:pl-12 w-full pt-8">{{ $slot }}</div>
    <div class="w-full md:w-[60%] lg:w-[90%]">
        <x-bg-with-motion class="{{ $motionSm ? 'bg-scale-sm' : '' }}" :background="$image" />
    </div>
</div>
