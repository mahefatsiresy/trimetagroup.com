<x-layout>
    {{-- hero --}}
    <div class="flex relative h-[50vh] lg:h-[60vh]">
        <div class="bg-neutral-500 h-full w-full"></div>
        <div class="bg-neutral-600 h-full w-full"></div>
        <div class="bg-neutral-700 h-full w-full hidden md:block"></div>
        <div class="bg-neutral-800 h-full w-full hidden md:block"></div>
        <div class="bg-neutral-900 h-full w-full hidden lg:block"></div>
        <div class="bg-neutral-950 h-full w-full hidden lg:block"></div>

        <h1 class="absolute bottom-12 px-4 md:px-12 text-center w-full font-semibold text-lg lg:text-2xl flex justify-center drop-shadow text-neutral-50" style="font-family: Poppins">
            <div class="max-w-lg">{{__("career.title")}}
                <div>
        </h1>
    </div>

    <div class="px-4 md:px-12 2xl:px-24 py-12 bg-gradient-to-tr from-neutral-950 to-neutral-900">
        <x-section-title :text='__("career.company-career")' dark />
        <p class="prose lg:prose-lg 2xl:prose-xl mb-8 text-neutral-100">{{__('career.intro')}}</p>
    </div>

    <div class="bg-gradient-to-r from-neutral-950 from-90% to to-neutral-900 px-4 md:px-12 2xl:px-24">
        @foreach($posts as $companyPosts)
        <div class="lg:flex items-center px-4 lg:px-12 2xl:px-24 h-[512px] lg:h-[400px]">
            <h3 style="font-family: Poppins" class="text-xl font-semibold pt-4 lg:pt-0 pb-8 text-neutral-200 lg:text-2xl lg:min-w-[512px]">
                {{__("career.offer-heading", ['company' => $companyPosts['name']])}}
            </h3>
            @if (empty($companyPosts['posts']))
            <div class="flex w-full lg:items-center justify-center">
                <div class="h-[360px] lg:h-[240px] w-full lg:w-3/4 bg-gradient-to-bl from-neutral-900 from-40% to-neutral-800 rounded-lg flex items-center justify-center p-4 pb-8 text-neutral-50 bg-cover">
                    <p class="font-semibold text-lg">Coming soon...</p>
                </div>
            </div>
            @else
            <div class="flex overflow-x-scroll pb-8 w-full scrollbar-track-neutral-950">
                @foreach($companyPosts['posts'] as $post)
                <a :href="/career/{{$post['slug']}}">
                    <div class="h-[328px] min-w-[256px] w-[256px] lg:min-w-[204px] lg:w-[204px] bg-gradient-to-t from-neutral-950/95 from-20% to-neutral-800 rounded-lg mr-4 flex items-end p-4 pb-8 text-neutral-50 bg-cover border border-neutral-900 hover:border-neutral-600" style="background-image: url({{$post['thumbnail']}});">
                        <p class="font-semibold text-lg">{{$post['title']}}</p>
                    </div>
                </a>
                <div class="h-[328px] min-w-[256px] w-[256px] lg:min-w-[204px] lg:w-[204px] bg-gradient-to-t from-neutral-950/95 from-20% to-neutral-800 rounded-lg mr-4 flex items-end p-4 pb-8 text-neutral-50 bg-cover"></div>
                <div class="h-[328px] min-w-[256px] w-[256px] lg:min-w-[204px] lg:w-[204px] bg-gradient-to-t from-neutral-950/95 from-20% to-neutral-800 rounded-lg mr-4 flex items-end p-4 pb-8 text-neutral-50 bg-cover"></div>
                <div class="h-[328px] min-w-[256px] w-[256px] lg:min-w-[204px] lg:w-[204px] bg-gradient-to-t from-neutral-950/95 from-20% to-neutral-800 rounded-lg mr-4 flex items-end p-4 pb-8 text-neutral-50 bg-cover"></div>
                <div class="h-[328px] min-w-[256px] w-[256px] lg:min-w-[204px] lg:w-[204px] bg-gradient-to-t from-neutral-950/95 from-20% to-neutral-800 rounded-lg mr-4 flex items-end p-4 pb-8 text-neutral-50 bg-cover"></div>
                <div class="h-[328px] min-w-[256px] w-[256px] lg:min-w-[204px] lg:w-[204px] bg-gradient-to-t from-neutral-950/95 from-20% to-neutral-800 rounded-lg mr-4 flex items-end p-4 pb-8 text-neutral-50 bg-cover"></div>
                @endforeach
            </div>
            @endif
        </div>
        @endforeach
    </div>
</x-layout>