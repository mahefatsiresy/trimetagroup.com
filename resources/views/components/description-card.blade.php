@props(['data', 'index', 'image' => '', 'textBoxClass' => ''])

<div class="relative h-full w-full min-h-[800px]">
    <div class="lg:absolute top-0 lg:w-[55%] bg-gradient-to-tr from-neutral-900 from-40% to-neutral-800 min-h-1/2 h-1/2 pt-4 px-4 {{0 === $index % 2 ? 'lg:right-0 lg:pl-40 lg:pr-12' : 'lg:left-0 lg:pl-12 lg:pr-40'}} {{$textBoxClass}}">
        <x-section-title class="mt-8 text-neutral-100" :text="$data['title']" :underline="false" dark />
        <ul class="pr-4 pb-8">
            @foreach ($data['descriptions'] as $description)
                <li class="prose md:prose-lg mb-4 text-neutral-400/95 list-disc ml-8 max-w-[600px]">{!! $description !!}</li>
            @endforeach
        </ul>
    </div>
    <div class="bg-neutral-800 lg:absolute top-40 min-h-[320px] lg:w-[55%] h-1/2 z-10 {1 === $index % 2 ? 'right-0' : 'left-0'}}">
        <img src="{{$image}}" alt="" width="800" height="800" class="w-full h-full object-cover block border-none p-0 m-0 object-top" />
    </div>
    {{-- <div class="w-[80px] h-[80px] rounded-full border-2 border-neutral-950 self-center grid place-items-center bg-neutral-100"> --}}
    {{--     <img class="h-[48x] w-[48px]" src="{{ $data['icon'] }}" alt="icon" height="64" width="64" /> --}}
    {{-- </div> --}}
</div>
