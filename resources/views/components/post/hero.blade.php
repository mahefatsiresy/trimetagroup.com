@props(['post', 'withCta' => false])
<x-bg-with-motion :background="$post['thumbnail']">
    <header class="h-[90vh] lg:min-h-[464px] md:h-[80vh] max-h-[640px] relative w-full">
        @if (!$post['thumbnail'])
            <div class="h-full w-full -z-10 absolute inset-0 bg-neutral-800 text-neutral-500 grid place-items-center">
                No featured image
            </div>
        @endif
        <div
            class="h-3/4 md:h-1/2 w-full absolute bottom-0 bg-gradient-to-t from-15% lg:from-45% from-neutral-950/70 flex flex-col justify-end md:flex-row  md:items-end md:justify-between pb-4 px-4 md:px-12  text-neutral-100">
            <div class="flex flex-col">
                <h1 class="text-3xl lg:text-5xl font-semibold mb-4 w-fit max-w-[1200px]" style="font-family: Poppins;">
                    {{ $post['title'] }}
                </h1>
                <div class="text-sm w-fit text-neutral-400">
                    {{ $post['date'] }}
                </div>
            </div>

            @if ($withCta)
                <x-button class="self-end" href="/news/{{ $post['slug'] }}">{{ __('common.news.post.cta') }}</x-button>
            @endif

        </div>
    </header>
</x-bg-with-motion>
