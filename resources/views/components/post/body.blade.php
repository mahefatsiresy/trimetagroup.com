@props(['post', 'posts'])
<div class="grid px-4 py-8 md:px-12 lg:grid-cols-[auto_352px] gap-8">
    @if (!$post['content'])
        <div>This post has no content</div>
    @else
        <div class="prose lg:prose-lg prose-gray">
            {!! $post['content'] !!}
        </div>
    @endif
    <x-post.more :posts="$posts" />
</div>
