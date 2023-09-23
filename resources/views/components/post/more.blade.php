@props(['posts'])

@if (0 !== count($posts))

    <div class="mt-20 lg:mt-0 w-full">
        <div class="h-0.5 w-1/2 bg-gray-400/70 mb-12 mx-auto lg:hidden"></div>
        <div class="mb-8">
            <x-section-title :text="__('common.news.more')" class="text-xl lg:text-2xl mt-0" />
        </div>
        <ul class="grid gap-12 lg:hidden">
            @foreach ($posts as $post)
                <x-post.preview :post="$post" />
            @endforeach
        </ul>
        <ul class="gap-8 hidden lg:grid w-full">
            @foreach ($posts as $post)
                <x-post.preview-vertical :post="$post" />
            @endforeach
        </ul>

        <x-button class="mt-8 w-full text-center" href="/news">{{ __('common.news.more') }}</x-button>
    </div>
@endif
