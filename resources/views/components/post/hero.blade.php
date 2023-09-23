@props(['post', 'withCta' => false])
<x-bg-with-motion :background="$post['thumbnail']">
    <header class="h-[90vh] lg:min-h-[464px] md:h-[80vh] max-h-[640px] relative w-full">
        @if (!$post['thumbnail'])
            <div class="h-full w-full -z-10 absolute inset-0 bg-gray-800 text-gray-500 grid place-items-center">
                No featured image
            </div>
        @endif
        <div
            class="h-3/4 md:h-1/2 w-full absolute bottom-0 bg-gradient-to-t from-15% lg:from-45% from-gray-950/70 flex flex-col justify-end md:flex-row  md:items-end md:justify-between pb-4 px-4 md:px-12  text-gray-100">
            <div class="flex flex-col">
                <h1 class="text-2xl lg:text-4xl font-bold mb-4 w-fit max-w-[1200px] font-[Poppins_Inter]">
                    {{ $post['title'] }}
                </h1>
                <div class="text-sm w-fit text-gray-400">
                    {{ $post['date'] }}
                </div>
            </div>

            @if ($withCta)
                <x-button href="/news{{ $post['slug'] }}">{{ __('common.news.post.cta') }}</x-button>
            @endif

        </div>
    </header>
</x-bg-with-motion>
