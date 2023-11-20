@php

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

<x-layout :title="__('ethics.document-title')">
    <article class="pt-16">
        <x-section-title :text="__('ethics.document-title')" class="px-4 md:px-12 pb-6" />
        <div class="prose lg:prose-lg text-gray-800 px-4 md:px-12 mb-12">
            {!! __("ethics.content") !!}
        </div>
    </article>
</x-layout>
