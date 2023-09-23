@props(['data', 'index']);

<div class="w-[72px] h-[72px] rounded-full border-2 border-green-500 self-center grid place-items-center bg-gray-100">
    <img class="h-[48x] w-[48px]" src="{{ $data['icon'] }}" alt="icon" height="64" width="64" />
</div>
<x-section-title class="mt-8 lg:text-xl text-lg text-green-400" :text="$data['title']" :underline="false" />
<ul class="lg:max-w-[700px] pr-4 pb-8">
    @foreach ($data['descriptions'] as $description)
        <li class="prose md:prose-lg mb-4 text-gray-300 list-disc ml-4 max-w-[600px]">{!! $description !!}</li>
    @endforeach
</ul>
