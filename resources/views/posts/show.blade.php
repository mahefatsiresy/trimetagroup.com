<x-layout :title="isset($error) ? __('common.cdn-error-title') : ($post ? $post['title'] : __('common.news.post.no-found'))">
    @if (isset($error))
        <div class="px-4 md:px-12 2xl:px-24 pb-8 h-[60vh] md:h-[75vh] lg:h-[90vh] flex flex-col items-center justify-center bg-neutral-950 text-neutral-100">
            <h1 class="text-xl md:text-3xl text-red-500 mb-8">{{__("common.cdn-error-title")}}</h1>
            <p class="md:max-w-3xl prose text-neutral-300 mb-8">{{__("common.cdn-error-description")}}</p>
            <x-button href='/'>{{__('common.go-home')}}</x-button>
        </div>
    @else
        @if (!$post)
            <div class="pb-8 h-[90vh] flex items-center justify-center bg-neutral-950 text-neutral-100">
                <h1>{{__('common.news.post.no-found')}}</h1>
            </div>
        @else
            <x-post.body :post="$post"/>

            <section class="px-4 lg:px-12 2x:px-24 bg-gradient-to-br from-neutral-950 from-80% to-neutral-900 py-12">
                    @if (count($posts) > 0)
                        <ul class="grid md:grid-cols-2 lg:grid-cols-3 2xl:grid-cols-4 gap-8">
                            {{-- @foreach ($posts->skip(1) as $post) --}}
                            @foreach ($posts as $p)
                                <x-post.preview :post="$p" />
                            @endforeach
                        </ul>
                    @else
                        <h3 class="text-lg text-center font-medium mb-4 text-neutral-200">
                            {{ __('common.news.no-more') }}
                        </h3>
                    @endif
            </section>
        @endif

    @endif
</x-layout>
