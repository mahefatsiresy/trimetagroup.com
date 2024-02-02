 <x-layout :title="__('common.news.document-title')" :description="__('common.news.meta-description')" path='/news'>
    @if (isset($error))
        <div class="px-4 md:px-12 2xl:px-24 pb-8 h-[60vh] md:h-[75vh] lg:h-[90vh] flex flex-col items-center justify-center bg-neutral-950 text-neutral-100">
            <h1 class="text-xl md:text-3xl text-red-500 mb-8">{{__("common.cdn-error-title")}}</h1>
            <p class="md:max-w-3xl prose text-neutral-300 mb-8">{{__("common.cdn-error-description")}}</p>
            <x-button href='/'>{{__('common.go-home')}}</x-button>
        </div>
    @else
        @if ($posts->isEmpty())
            <div class="pb-8 h-[90vh] flex items-center justify-center bg-neutral-950 text-neutral-100">
                <h1>{{__('common.news.soon')}}</h1>
                <x-link href='/' class="underline pl-1">Go back home</x-link>
            </div>
        @else
            <x-post.hero :post="$posts[0]" withCta />

            <section class="px-4 lg:px-12 2xl:px-24 bg-gradient-to-br from-neutral-950 from-80% to-neutral-900 py-12">
                    {{-- @if ($posts->count() > 1) --}}
                    @if (count($posts) > 1)
                        <ul class="grid md:grid-cols-2 lg:grid-cols-3 2xl:grid-cols-4 gap-8">
                            {{-- @foreach ($posts->skip(1) as $post) --}}
                            @foreach ($posts->skip(1) as $post)
                                <x-post.preview :post="$post" />
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
