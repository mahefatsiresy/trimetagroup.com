<x-layout>
    {{-- hero --}}
    <div class="flex relative h-[50vh] lg:h-[60vh]">
        <div class="bg-gray-500 h-full w-full"></div>
        <div class="bg-gray-600 h-full w-full"></div>
        <div class="bg-gray-700 h-full w-full hidden md:block"></div>
        <div class="bg-gray-800 h-full w-full hidden md:block"></div>
        <div class="bg-gray-900 h-full w-full hidden lg:block"></div>
        <div class="bg-gray-950 h-full w-full hidden lg:block"></div>

        <h1 class="absolute bottom-12 px-4 md:px-12 text-center w-full font-semibold text-lg lg:text-2xl flex justify-center drop-shadow text-gray-50"
            style="font-family: Poppins"
        >
            <div class="max-w-lg">{{__("career.title")}}<div>
        </h1>
    </div>

    <div class="px-4 lg:px-12 2xl:px-24 py-12 bg-gradient-to-tr from-gray-950 to-gray-900">
        <x-section-title :text='__("career.company-career")' dark/>
        <p class="prose lg:prose-lg 2xl:prose-xl mb-8 text-gray-100">{{__('career.intro')}}</p>

        @foreach($posts as $companyPosts)
            @foreach($companyPosts['posts'] as $post)
            <div class="lg:flex items-center">
                <h3 style="font-family: Poppins" class="text-lg font-semibold pb-8 text-gray-200 lg:text-2xl lg:min-w-[512px]">{{__("career.offer-heading", ['company' => $companyPosts['name']])}}</h3>
                <a :href="/career/{{$post['slug']}}" class="flex overflow-x-scroll pb-8 w-full scrollbar-track-gray-950">
                    <div class="h-[328px] min-w-[256px] w-[256px] lg:min-w-[204px] lg:w-[204px] bg-gradient-to-t from-gray-950/95 from-20% to-gray-800 rounded-lg mr-4 flex items-end p-4 pb-8 text-gray-50 bg-cover border border-gray-900 hover:border-gray-600"
                        style="background-image: url({{$post['thumbnail']}});">
                        <p class="font-semibold text-lg">{{$post['title']}}</p>
                    </div>
                    <div class="h-[328px] min-w-[256px] w-[256px] lg:min-w-[204px] lg:w-[204px] bg-gradient-to-t from-gray-950/95 from-20% to-gray-800 rounded-lg mr-4 flex items-end p-4 pb-8 text-gray-50 bg-cover"></div>
                    <div class="h-[328px] min-w-[256px] w-[256px] lg:min-w-[204px] lg:w-[204px] bg-gradient-to-t from-gray-950/95 from-20% to-gray-800 rounded-lg mr-4 flex items-end p-4 pb-8 text-gray-50 bg-cover"></div>
                    <div class="h-[328px] min-w-[256px] w-[256px] lg:min-w-[204px] lg:w-[204px] bg-gradient-to-t from-gray-950/95 from-20% to-gray-800 rounded-lg mr-4 flex items-end p-4 pb-8 text-gray-50 bg-cover"></div>
                    <div class="h-[328px] min-w-[256px] w-[256px] lg:min-w-[204px] lg:w-[204px] bg-gradient-to-t from-gray-950/95 from-20% to-gray-800 rounded-lg mr-4 flex items-end p-4 pb-8 text-gray-50 bg-cover"></div>
                    <div class="h-[328px] min-w-[256px] w-[256px] lg:min-w-[204px] lg:w-[204px] bg-gradient-to-t from-gray-950/95 from-20% to-gray-800 rounded-lg mr-4 flex items-end p-4 pb-8 text-gray-50 bg-cover"></div>
                </a>
            </div>
            @endforeach
        @endforeach
    </div>
    </div>
</x-layout>
