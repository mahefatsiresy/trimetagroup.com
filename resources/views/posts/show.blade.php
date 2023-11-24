<x-layout :title="isset($error) ? 'CDN is not responding' : ($post ? $post['title'] : __('new.post.no-found'))">
post is not defined but posts is : Post not found, show suggestions
post is not defined and posts in not defined : CDN error

    @if (isset($error))
        <h1 class="pb-8 h-[90vh] flex items-center justify-center bg-neutral-950 text-neutral-100">
            CDN is not reponsding... <a href='/' class="underline pl-1">Go back home</a>
        </h1>
    @else
        @if (!$post)
            <h1>Post not found</h1>
        @else
            <x-post.body />

            <div>
                <h2>More posts</h2>
                    @if (empty($posts))
                        <p>Comming soon...</p>
                    @else
                        <div>
                            @foreach($posts as $p)
                                <x-post.preview :post="$p"/>
                            @endforeach
                        </div>
                    @endif
            </div>

        @endif

    @endif

    {{-- @if (isset($post) && isset($posts)) --}}
    {{--     <x-post.hero :post="$post" /> --}}
    {{--     <x-post.body :post="$post" :posts="$posts" /> --}}
    {{-- @else --}}
    {{-- @endif --}}
</x-layout>
