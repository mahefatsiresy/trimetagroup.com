@props(['post', 'dark' => false])
<li class="rounded-md">
    <a href="/news/{{ $post['slug'] }}" class="overflow-hidden w-full block rounded-md">
        @if ($post['thumbnail'])
            <img src="{{ $post['thumbnail'] }}" alt="thubmnail of {{ $post['slug'] }}" width="800" height="800"
                class="w-full h-[192px] object-cover hover:scale-105 duration-300" />
        @else
            <div class="w-full h-[192px] bg-gray-900 text-gray-600 flex items-center justify-center">
                {{ __('common.news.post.no-image') }}
            </div>
        @endif
    </a>
    <div class="flex flex-col justify-between gap-3 mt-3">
        <div>
            <h3 class="{{ 'text-xl lg:text-2xl font-semibold mb-2 ' . ($dark ? 'text-gray-100' : 'text-gray-800') }}">
                <a class="hover:text-green-700" href="/news/{{ $post['slug'] }}">
                    {{ $post['title'] }}
                </a>
            </h3>

            <div class="text-gray-500 text-sm font-semibold">{{ $post['date'] }}</div>

            <div class="{{ 'line-clamp-3 mt-4' . ($dark ? 'text-gray-700' : 'text-gray-400') }}">
                {!! $post['excerpt'] !!}
            </div>
        </div>
        <x-button href="/news/{{ $post['slug'] }}" class="self-end"
            secondary>{{ __('common.news.post.cta') }}</x-button>
    </div>
</li>
