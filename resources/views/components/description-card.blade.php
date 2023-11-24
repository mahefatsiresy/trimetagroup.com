@props(['data', 'index', 'image' => '', 'textBoxClass' => ''])

<div class="relative h-full w-full pb-16 lg:pb-0 lg:min-h-[800px]">
    <div class="lg:absolute top-0 lg:w-[55%] bg-gradient-to-tr from-neutral-900 from-40% to-neutral-800 min-h-1/2 h-1/2 pt-4 px-4 md:px-12 {{0 === $index % 2 ? 'lg:right-0 lg:pl-40 lg:pr-12' : 'lg:left-0 lg:pl-12 lg:pr-40'}} {{$textBoxClass}}">
        <x-section-title class="mt-8 md:text-2xl mx-0 text-neutral-100" :text="$data['title']" :underline="false" dark />
        <ul class="pr-4 pb-8">
            @foreach ($data['descriptions'] as $description)
                <li class="prose md:prose-lg mb-4 text-neutral-400/95 list-disc ml-8 max-w-[600px]">{!! $description !!}</li>
            @endforeach
        </ul>
    </div>
    <div class="bg-neutral-800 lg:absolute top-40 h-[320px] lg:h-1/2 lg:min-h-[320px] lg:w-[55%] z-10 {{1 === $index % 2 ? 'right-0' : 'left-0'}}">
        <img src="{{$image}}" alt="" width="1000px" height="1000px" class="w-full h-full object-cover" />
    </div>
</div>
