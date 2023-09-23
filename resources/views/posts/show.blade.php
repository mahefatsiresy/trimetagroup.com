<x-layout :title="isset($post) ? $post['title'] : 'CDN is not responding'">
    @if (isset($post) && isset($posts))
        <x-post.hero :post="$post" />
        <x-post.body :post="$post" :posts="$posts" />
    @else
        <p class="pb-8 h-[400px] flex items-center justify-center">CDN is not reponsding...</p>
    @endif
</x-layout>
