@php
    $title = $slug === 'trimeta-agrofood' ? 'Trimeta Agro Food' : ('alma-villas' === $slug ? 'Alma Villas' : ucwords($slug));
@endphp

<x-layout :title="$title">

    <x-company-about :slug="$slug" />
    {{-- <div class="px-4 md:px-12 2xl:px-24 bg-neutral-950 pt-12"> --}}
        {{-- <x-section-title :text="__('common.company-news-title :company', ['company' => $title])" class="!mt-0" dark/> --}}
        {{-- @if (isset($error)) --}}
        {{--     <p class="md:max-w-3xl prose text-neutral-400 pb-8 mx-auto mb-0">{{__("common.cdn-error-description")}}</p> --}}
        {{-- @else --}}
        {{--     @if (0 === $posts->count()) --}}
        {{--         <div> --}}
        {{--             {{ __('common.company-news-empty :company', ['company' => $title]) }} --}}
        {{--         </div> --}}
        {{--     @else --}}
        {{--         <ul class="grid gap-4 my-12"> --}}
        {{--                 @foreach ($posts as $post) --}}
        {{--                     <x-post.preview :post="$post" /> --}}
        {{--                 @endforeach --}}
        {{--         </ul> --}}
        {{--     @endif --}}
        {{-- @endif --}}
    {{-- </div> --}}

</x-layout>
