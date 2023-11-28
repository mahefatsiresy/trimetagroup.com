@props(['post', 'posts'])

<x-post.hero :post="$post" centered/>
<div class="grid px-4 md:py-16 md:px-12 gap-8 bg-gradient-to-tr from-neutral-950 from-80% to-neutral-900 min-h-[400px]">
    @if (!$post['content'])
        <div class="prose-lg md:prose-xl text-neutral-200 px-4 md:px-12 w-3/4 min-w-[640px] max-w-3xl mx-auto">
            {{__('common.news.post.no-content')}}
        </div>
    @else
        <div class="prose-lg md:prose-xl text-neutral-200 px-4 md:px-12 w-3/4 min-w-[640px] max-w-3xl mx-auto">
            {!! $post['content'] !!}
        </div>
    @endif
</div>
