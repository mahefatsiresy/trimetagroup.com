@php

    function getCommitmentsdata($key, $descs)
    { $numberLetter = ['one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight'];

        $desc = [];
        for ($i = 0; $i < $descs; $i++) {
            $desc[] = __("commitments.{$key}.descriptions.{$numberLetter[$i]}");
        }

        return [
            'title' => __("commitments.{$key}.title"),
            'image' => __("commitments.{$key}.image"),
            'href' => __("commitments.{$key}.href"),
            'descriptions' => $desc,
        ];
    }

    $environmentCommitments = getCommitmentsData('environmental', 7);
    $societalCommitments = getCommitmentsData('societal', 8);

    function getCSRData()
    {
        $numberLetter = ['one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight'];

        $data = [5, 3, 4, 4];

        $categories = [];

        for ($i = 0; $i < count($data); $i++) {
            $desc = [];
            for ($j = 0; $j < $data[$i]; $j++) {
                $desc[] = __("commitments.csr-projects.categories.{$numberLetter[$i]}.descriptions.{$numberLetter[$j]}");
            }

            $categories[] = ['title' => __("commitments.csr-projects.categories.{$numberLetter[$i]}.title"), 'descriptions' => $desc];
        }

        return [
            'title' => __(`commitments.csr-projects.title`),
            'categories' => $categories,
        ];
    }

    $csrData = getCSRData();

    // ethics

    $numberLetter = ['one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight'];

    $descData = [2, 3, 2, 1, 1, 2];

    $ethics = array_map(
        function ($data, $index) use ($numberLetter) {
            $desc = [];

            for ($i = 0; $i < $data; $i++) {
                $desc[] = __("ethics.cards.{$numberLetter[$index]}.descriptions.{$numberLetter[$i]}");
            }

            return [
                'icon' => __("ethics.cards.{$numberLetter[$index]}.icon"),
                'title' => __("ethics.cards.{$numberLetter[$index]}.title"),
                'descriptions' => $desc,
            ];
        },
        $descData,
        array_keys($descData),
    );
@endphp

<x-layout :title="__('commitments.document-title')">
    <article class="pt-16 bg-gray-950">
        <x-section-title :text="__('commitments.document-title')" class="px-4 md:px-12 pb-6" dark/>
        <div class="p-4 md:p-12 grid lg:grid-cols-2 gap-y-8">
            @foreach ($ethics as $descriptions)
                <div class="w-[80%]">
                    <x-description-card :data="$descriptions" :index="$loop->index" />
                </div>
            @endforeach
        </div>
    </article>

    <article>

        <x-fullpage-card :image="$environmentCommitments['image']" index="1" dark>
            <div class="pt-8 text-gray-100">
                <x-section-title :text="$environmentCommitments['title']" dark/>
                <ul class="lg:max-w-[700px] pr-4 py-4">
                    @foreach ($environmentCommitments['descriptions'] as $desc)
                        <li class="prose md:prose-lg mb-4 list-disc ml-4 max-w-[600px] text-gray-400">
                            {{ $desc }}
                        </li>
                    @endforeach
                </ul>
            </div>
        </x-fullpage-card>

        <x-fullpage-card :image="$societalCommitments['image']" index="2" dark>
            <div class="pt-8">
                <x-section-title :text="$societalCommitments['title']" dark/>
                <ul class="lg:max-w-[700px] pr-4 py-4">
                    @foreach ($societalCommitments['descriptions'] as $desc)
                        <li class="prose md:prose-lg mb-4 list-disc ml-4 max-w-[600px] text-gray-400">
                            {{ $desc }}
                        </li>
                    @endforeach
                </ul>
            </div>
        </x-fullpage-card>

        <section class="w-full px-4 md:px-12 bg-gradient-to-tr from-gray-950 from-55% to-gray-950/95 py-12 pt-12">
            <x-section-title :text="__('commitments.csr-projects.title')" dark/>
            <ul class="grid gap-8 mt-8 text-slate-700 justify-items-start md:grid-cols-2">
                @foreach ($csrData['categories'] as $category)
                    <li class="mb-6">
                        <h3 class="mb-4 text-lg font-bold text-gray-300 uppercase rounded-md">
                            {{ $category['title'] }}
                        </h3>
                        <ul class="pl-4 text-gray-400">
                            @foreach ($category['descriptions'] as $desc)
                                <li class="mb-2 list-disc">
                                    {{ $desc }}
                                </li>
                            @endforeach
                        </ul>
                    </li>
                @endforeach
            </ul>
        </section>
    </article>

    <section id="ethics" class="bg-gradient-to-br from-gray-950 from-55% to-gray-950/90 py-12">
        <x-section-title :text="__('ethics.document-title')" class="px-4 md:px-12 pb-6" dark/>
        <div class="prose lg:prose-lg text-gray-300 px-4 md:px-12">
            {!! __("ethics.content") !!}
        </div>
    </section>

</x-layout>
