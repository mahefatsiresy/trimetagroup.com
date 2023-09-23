 <x-layout :title="__('common.news.document-title')">
     @if (isset($post) && isset($posts))
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
     @else
         <p class="pb-8 h-[400px] flex items-center justify-center">CDN is not reponsding...</p>
     @endif
 </x-layout>
