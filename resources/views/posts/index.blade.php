 <x-layout :title="__('common.news.document-title')">
    @if (isset($error))
        <h1 class="pb-8 h-[90vh] flex items-center justify-center bg-neutral-950 text-neutral-100">
            CDN is not reponsding... <a href='/' class="underline pl-1">Go back home</a>
        </h1>
    @else
        @if (empty($posts))
            <h1 class="pb-8 h-[90vh] flex items-center justify-center bg-neutral-950 text-neutral-100">
                News comming soon...<a href='/' class="underline pl-1">Go back home</a>
            </h1>
        @else
            <x-post.hero :post="$posts[0]" withCta />

            <div class="px-4 lg:px-12 py-12">
                @if ($posts->count() > 1)
                    <ul class="grid gap-8">
                        @foreach ($posts->skip(1) as $post)
                            <x-post.preview :post="$post" />
                        @endforeach
                    </ul>
                @else
                    <h3 class="text-3xl font-medium mb-4">
                        {{ __('common.news.no-more') }}
                    </h3>
                @endif
            </div>
        @endif
    @endif
 </x-layout>
