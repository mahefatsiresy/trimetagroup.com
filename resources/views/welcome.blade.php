@php
    $numberLetter = ['one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight'];

    $descData = [3, 5, 3, 3, 2, 1];

    $responsibilities = array_map(
        function ($data, $index) use ($numberLetter) {
            $desc = [];

            for ($i = 0; $i < $data; $i++) {
                $desc[] = __("home.sections.responsibilities.{$numberLetter[$index]}.descriptions.{$numberLetter[$i]}");
            }

            return [
                'title' => __("home.sections.responsibilities.{$numberLetter[$index]}.title"),
                'icon' => __("home.sections.responsibilities.{$numberLetter[$index]}.icon"),
                'image' => __("home.sections.responsibilities.{$numberLetter[$index]}.image"),
                'descriptions' => $desc,
            ];
        },
        $descData,
        array_keys($descData),
    );
@endphp

<x-layout>
    <x-home.hero />

    {{-- companies --}}
    <section class="w-full pt-8 text-gray-100 bg-gradient-to-bl from-gray-950 to-gray-900 md:pt-12 md:pb-24">
        <x-section-title class="px-6 mb-4 md:px-12" :text="__('home.sections.group.title')" dark />
        <p class="px-6 mt-4 mb-8 md:px-12">
            {{ __('home.sections.group.subtitle') }}
        </p>
        <ul class="flex flex-col md:grid md:grid-cols-2 lg:flex lg:flex-row lg:max-h-[512px] lg:h-[80vh]">
            @foreach (['enduma', 'trimeta-agrofood', 'wimmo', 'millot', 'orkidex', 'alma-villas'] as $name)
                <x-home.company-preview :key="$name" :index="$loop->iteration" />
            @endforeach
        </ul>
    </section>

    {{-- ethics --}}
    <section class="px-6 py-8 bg-green-300 md:py-12 md:px-12">
        <div class="flex flex-col gap-4 md:flex-row md:justify-between">
            <x-section-title :text="__('home.sections.ethics.title')" />
            <ul class="flex self-center justify-center w-full gap-2 md:w-fit md:gap-4 lg:text-lg lg:gap-6">
                <li class="font-bold text-green-800 uppercase">
                    {{ __('home.sections.ethics.willingness') }}
                </li>
                <li class="font-bold text-red-700 uppercase">
                    {{ __('home.sections.ethics.responsibility') }}
                </li>
                <li class="font-bold text-gray-900 uppercase">
                    {{ __('home.sections.ethics.performance') }}
                </li>
            </ul>
        </div>
        <div class="flex flex-col mt-8 md:gap-4">
            <ul class="pl-4 text-lg md:text-xl max-w-[640px] text-gray-950">
                @foreach (['one', 'two', 'three'] as $num)
                    <li class="mb-6 list-disc">
                        {{ __("home.sections.ethics.resume.${num}") }}
                    </li>
                @endforeach
            </ul>
            <x-button href="/about-us/our-ethical-charter">
                {{ __('home.sections.ethics.cta') }}
            </x-button>
        </div>
    </section>

    {{-- responsibilities --}}
    <section class="pt-8 bg-gray-950">
        <div class="px-4 pb-12 lg:px-12">
            <x-section-title :text="__('home.sections.responsibilities.title')" dark />
        </div>
        @foreach ($responsibilities as $data)
            <x-fullpage-card class="bg-top" :image="$data['image']" :index="$loop->index" dark motionSm>
                <x-description-card :data="$data" :index="$loop->index" />
            </x-fullpage-card>
        @endforeach
    </section>


    {{-- news --}}
    {{--
    <div class="px-4 md:px-12">
        <x-section-title :text="__('common.news.section-title')" />
        @if (isset($posts))

            <ul class="grid gap-4 my-12">
                @if (!$posts || 0 === $posts->count())
                    <div>{{ __('common.news.empty') }}</div>
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
    --}}


</x-layout>
