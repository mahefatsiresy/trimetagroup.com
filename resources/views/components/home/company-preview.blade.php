@props(['key', 'index'])

@php
    $href = $key;
    $name = __("home.sections.group.${key}.name");
    $logo = __("home.sections.group.${key}.logo");
    $background = __("home.sections.group.${key}.background");
    $description = __("home.sections.group.${key}.description");
@endphp

<li key={company.name}
    class="w-full h-[512px] lg:w-[calc(100vw/6)] lg:h-full bg-center bg-cover bg-no-repeat hover:w-[456px] transition-all ease-in-out duration-1000 cursor-pointer delay-0"
    style="background-image: url({{ $background }});z-index: {{ $index + 2 }};">

    <a href="/activities/{{ $href }}"
        class="bg-gradient-to-t from-gray-950/90 from-35% w-full h-full flex flex-col justify-end p-4 transition-none">

        <p class="mb-4 w-[164px]">{{ $description }}</p>

        <img src="{{ $logo }}"" alt="logo" width={400} height={400}
            class="w-[176px] h-auto lg:h-auto lg:w-[128px] object-contain transition-none" />

    </a>
</li>
