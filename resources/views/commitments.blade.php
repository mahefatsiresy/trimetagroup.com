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

    $numberLetter = ['one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine'];

    $descData = [2, 3, 9, 2, 1, 2];

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

<x-layout :title="__('commitments.document-title')" :description="__('commitments.meta-description')" path={{$path}}>
    <article class="pt-16 bg-neutral-950">
        <x-section-title :text="__('commitments.document-title')" class="px-4 md:px-12 pb-6" dark/>
        <div class="p-4 md:p-12 2xl:px-24">
            @foreach ($ethics as $descriptions)
                @if ($loop->index === 2)
                    <div class='mb-32'>
                        <x-description-card :data="$descriptions" :index="$loop->index" :image="$descriptions['image']" textBoxClass="lg:h-full"/>
                    </div>
                @else
                    <x-description-card :data="$descriptions" :index="$loop->index" :image="$descriptions['image']"/>
                @endif
            @endforeach
        </div>
    </article>

    <article class="px-4 md:px-12 2xl:px-24 bg-neutral-950 pb-16">
        <div class="mb-32">
            <x-description-card :data="$environmentCommitments" :index="1" :image="$environmentCommitments['image']" textBoxClass="h-full"/>
        </div>
        <x-description-card :data="$societalCommitments" :index="0" :image="$societalCommitments['image']" textBoxClass="h-full"/>
    </article>
</x-layout>
