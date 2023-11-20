@props(['data', 'index'])

<div class="w-[80px] h-[80px] rounded-full border-2 border-gray-950 self-center grid place-items-center">
    <img class="h-[48x] w-[48px]" src="{{ $data['icon'] }}" alt="icon" height="64" width="64" />
</div>
<x-section-title class="mt-8 lg:text-xl font-bold text-lg text-gray-900" :text="$data['title']" :underline="false" />
<ul class="pr-4 pb-8">
    @foreach ($data['descriptions'] as $description)
        <li class="prose md:prose-lg mb-4 text-gray-700 list-disc ml-8 max-w-[600px]">{!! $description !!}</li>
    @endforeach
</ul>
