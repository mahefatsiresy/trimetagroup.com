@php
    $title = ($slug === 'trimeta-agrofood' ? 'Trimeta Agro Food' : 'alma-villas' === $slug) ? 'Alma Villas' : ucwords($slug);
@endphp

<x-layout :title="$title">

    <x-company-about :slug="$slug" />
    <div class="px-4 md:px-12">

        <x-section-title :text="__('common.company-news-title :company', ['company' => $title])" />
        @if (isset($post))
            <ul class="grid gap-4 my-12">
                @if (!$posts || 0 === $posts->count())
                    <div>
                        {{ __('common.company-news-empty :company', ['company' => $title]) }}
                    </div>
                @else
                    @foreach ($posts as $post)
                        <x-post.preview :post="$post" />
                    @endforeach
                @endif
            </ul>
        @else
            <p class="pb-8">CDN is not reponsding...</p>
        @endif
    </div>

</x-layout>
