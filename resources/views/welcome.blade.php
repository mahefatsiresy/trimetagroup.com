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

<x-layout :title="__('home.document-title')" :description="__('home.meta-description')">
    {{-- companies --}}
    <section class="w-full pt-8 text-neutral-100 bg-gradient-to-tl from-neutral-950 to-neutral-900 md:pt-12">
        <h1 class='hidden'>Trimeta Group</h1>
        <p class="px-6 mt-16 mb-8 md:px-12 text-center text-lg">
            {{ __('home.sections.group.subtitle') }}
        </p>
        <ul class="flex flex-col md:grid md:grid-cols-2 lg:flex lg:flex-row lg:flex-grow lg:max-h-[632px] lg:h-[90vh]">
            @foreach (['enduma', 'trimeta-agrofood', 'wimmo', 'orkidex', 'alma-villas'] as $name)
                <x-home.company-preview :key="$name" :index="$loop->iteration" />
            @endforeach
        </ul>
    </section>

    <x-home.hero />

    {{-- ethics --}}
    <section class="px-6 py-8 bg-neutral-100 md:py-12 md:px-12 pb-24 bg-gradient-to-tl from-neutral-950 to-neutral-900 min-h-[512px] lg:h-[80vh] flex flex-col justify-center">
        <x-section-title :text="__('home.sections.ethics.title')" dark/>
        <div class="flex flex-col gap-4 md:flex-row md:justify-between mx-auto w-fit">
            <ul class="flex self-center justify-center w-full gap-2 md:w-fit md:gap-4 text-sm lg:text-lg lg:gap-6 text-neutral-400">
                <li class="font-bold uppercase">
                    {{ __('home.sections.ethics.willingness') }}
                </li>
                <li class="font-bold uppercase">
                    {{ __('home.sections.ethics.responsibility') }}
                </li>
                <li class="font-bold uppercase">
                    {{ __('home.sections.ethics.performance') }}
                </li>
            </ul>
        </div>
        <div class="flex flex-col mt-8 md:gap-4 items-center">
            <div class="pl-4 pb-6 text-lg md:text-xl md:max-w-3xl text-neutral-100">
                {{ __("home.sections.ethics.resume.one") }}
            </div>
            <x-button href="/about-us/our-values">
                {{ __('home.sections.ethics.cta') }}
            </x-button>
        </div>
    </section>

    {{-- commitments --}}
    <section class="min-h-[512px] lg:h-[80vh] flex flex-col justify-center bg-bottom bg-cover" style="background-image: url(/images/commitments-bg.webp);">
        <div class="bg-neutral-950/70 px-6 py-8 text-neutral-100 md:py-12 md:px-12 pb-24 h-full">
            <x-section-title :text="__('home.sections.commitment.title')" dark/>
            <div class="flex flex-col mt-8  gap-8 md:gap-16 items-center">
                <div class="pl-4 pb-6 text-lg md:text-xl max-w-[640px]">
                    {{ __("home.sections.commitment.content") }}
                </div>
                <x-button href="/our-commitments">
                    {{ __('home.sections.commitment.cta') }}
                </x-button>
            </div>
        </div>
    </section>



    {{-- responsibilities --}}
    {{--
    <section class="pt-8 bg-neutral-950">
        <div class="px-4 pb-12 lg:px-12">
            <x-section-title :text="__('home.sections.responsibilities.title')" dark />
        </div>
        <p class="text-neutral-100 px-4 pb-16 lg:px-12 text-lg md:text-xl max-w-[640px]">
            {{__('home.sections.responsibilities.subtitle')}}
        </p>
        @foreach ($responsibilities as $data)
            <x-fullpage-card class="bg-top" :image="$data['image']" :index="$loop->index" dark motionSm>
                <x-description-card :data="$data" :index="$loop->index" />
            </x-fullpage-card>
        @endforeach
    </section>
    --}}


    {{-- news --}}
    {{--mission
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
