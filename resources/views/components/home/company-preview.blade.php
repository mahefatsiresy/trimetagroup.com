@props(['key', 'index'])

@php
    $href = $key;
    $name = __("home.sections.group.${key}.name");
    $logo = __("home.sections.group.${key}.logo");
    $background = __("home.sections.group.${key}.background");
    $description = __("home.sections.group.${key}.description");
@endphp

<li
    {{-- class="w-full h-[512px] lg:w-[calc(100vw/6)] lg:h-full bg-center bg-cover bg-no-repeat hover:w-[456px] transition-all ease-in-out duration-1000 cursor-pointer delay-0" --}}
    class="w-full h-[512px] lg:w-[calc(100vw/6)] lg:h-full bg-center bg-cover bg-no-repeat lg:hover:w-[744px] 2xl:hover:w-[960px] transition-all ease-in-out duration-1000 cursor-pointer delay-0"
    style="background-image: url({{ $background }});z-index: {{ $index + 2 }};">

    <a href="/activities/{{ $href }}"
        class="bg-gradient-to-b from-neutral-950/40 from-15% via-neutral-950/0 to-90% to-neutral-950/90 w-full h-full flex flex-col justify-between p-4 2xl:px-8 transition-none">

        <img src="{{ $logo }}"" alt="logo" width="400" height="400"
            class="w-[176px] h-auto lg:h-auto lg:w-[128px] 2xl:w-[128px] object-contain transition-none" />

        <p class="mb-4 w-full lg:w-[128px] 2xl:w-[128px] 2xl:text-lg">{{ $description }}</p>
    </a>
</li>
