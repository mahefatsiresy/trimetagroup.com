@props(['background'])

<div class="relative grid h-full overflow-clip">
    {{-- background --}}
    <div style="background-image: url({{ $background }})"
        {{ $attributes(['class' => 'bg-with-motion absolute inset-0 w-full h-full transition-all bg-center bg-no-repeat bg-cover overflow-clip duration-0']) }}>
        <div class="w-full h-full"></div>
    </div>

    <div class="z-10">
        {{ $slot }}
    </div>
</div>
