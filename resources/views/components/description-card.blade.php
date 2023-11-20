@props(['data', 'index'])

<div class="w-[80px] h-[80px] rounded-full border-2 border-gray-950 self-center grid place-items-center bg-gray-100">
    <img class="h-[48x] w-[48px]" src="{{ $data['icon'] }}" alt="icon" height="64" width="64" />
</div>
<x-section-title class="mt-8 lg:text-xl font-bold text-lg text-gray-100" :text="$data['title']" :underline="false" dark/>
<ul class="pr-4 pb-8">
    @foreach ($data['descriptions'] as $description)
        <li class="prose md:prose-lg mb-4 text-gray-400/95 list-disc ml-8 max-w-[600px]">{!! $description !!}</li>
    @endforeach
</ul>
