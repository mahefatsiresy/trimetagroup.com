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
                'image' => __("ethics.cards.{$numberLetter[$index]}.image"),
            ];
        },
        $descData,
        array_keys($descData),
    );
@endphp

<x-layout :title="__('commitments.document-title')">
    <article class="pt-16 bg-neutral-950">
        <x-section-title :text="__('commitments.document-title')" class="px-4 md:px-12 pb-6" dark/>
        <div class="p-4 md:p-12 2xl:px-24">
            @foreach ($ethics as $descriptions)
                <x-description-card :data="$descriptions" :index="$loop->index" :image="$descriptions['image']" />
            @endforeach
        </div>
    </article>

    <article class="px-4 md:px-12 2xl:px-24 bg-neutral-950 pb-16">
        <div class="mb-32">
            <x-description-card :data="$environmentCommitments" :index="1" :image="$environmentCommitments['image']" textBoxClass="h-full"/>
        </div>
        <x-description-card :data="$societalCommitments" :index="0" :image="$societalCommitments['image']" textBoxClass="h-full"/>
    </article>

    <section class="w-full px-4 md:px-12 2xl:px-24 bg-gradient-to-tr from-neutral-950 from-55% to-neutral-950/95 py-12 pt-12">
        <x-section-title :text="__('commitments.csr-projects.title')" dark/>
        <ul class="grid gap-8 mt-16 text-slate-700 justify-items-start md:grid-cols-2">
            @foreach ($csrData['categories'] as $category)
                <li class="mb-6">
                     <h3 class="mb-4 text-lg font-bold text-neutral-300 uppercase rounded-md">
                         {{ $category['title'] }}
                     </h3>
                     <ul class="pl-4 text-neutral-400">
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

    <section id="ethics" class="bg-gradient-to-br from-neutral-950 from-60% to-neutral-900 py-12">
        <x-section-title :text="__('ethics.document-title')" class="px-4 md:px-12 pb-6" dark/>
        <div class="prose-lg md:prose-xl text-neutral-300 px-4 md:px-12 max-w-3xl mx-auto">
            {!! __("ethics.content") !!}
        </div>
    </section>

</x-layout>
