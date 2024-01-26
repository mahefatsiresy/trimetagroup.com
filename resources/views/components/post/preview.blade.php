@props(['post', 'dark' => false])

<li>
    <x-link href="/news/{{ $post['slug'] }}" class="overflow-hidden w-full block">
        @if ($post['thumbnail'])
            <img src="{{ $post['thumbnail'] }}" alt="thubmnail of {{ $post['slug'] }}" width="800" height="800"
                class="w-full h-[256px] object-cover hover:scale-105 duration-300" />
        @else
            <div class="w-full h-[256px] bg-neutral-800 text-neutral-600 flex items-center justify-center">
                {{ __('common.news.post.no-image') }}
            </div>
        @endif
    </x-link>
    <div class="flex flex-col justify-between gap-3 bg-gradient-to-br from-neutral-950 to bg-neutral-900 p-6">
        <div>
            <h3 class="text-xl lg:text-2xl font-semibold mb-2 text-neutral-100">
                <x-link href="/news/{{ $post['slug'] }}">
                    {{ $post['title'] }}
                </x-link>
            </h3>

            <div class="text-neutral-500 text-sm font-semibold">{{ $post['date'] }}</div>

            <div class="line-clamp-3 mt-4 text-neutral-400">
                {!! $post['excerpt'] !!}
            </div>
        </div>
        <x-button href="/news/{{ $post['slug'] }}" class="mt-8 w-3/4 text-center mx-auto"
            secondary>{{ __('common.news.post.cta') }}</x-button>
    </div>
</li>
