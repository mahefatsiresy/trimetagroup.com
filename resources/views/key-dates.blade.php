@php

    $numberLetter = ['one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight'];

    $companies = [['Alma Villas', 1], ['Orkidex', 1], ['Millot', 2], ['Trimeta Finance', 1], ['Biosave', 1], ['Trimeta Agrofood', 3], ['Vanille Mad', 2], ['Wimmo', 2], ['Enduma', 1]];

    $companies = array_map(function ($company) use ($numberLetter) {
        $data = [
            'name' => $company[0],
            'date' => __("key-dates.{$company[0]}.date"),
            'image' => __("key-dates.{$company[0]}.image"),
            'abouts' => [],
        ];

        for ($i = 0; $i < $company[1]; $i++) {
            $data['abouts'][] = __("key-dates.{$company[0]}.about.{$numberLetter[$i]}");
        }

        return $data;
    }, $companies);

@endphp

<x-layout :title="__('key-dates.document-title')">
    <div class="pt-24 pb-24 overflow-x-hidden bg-gradient-to-tl from-neutral-950 from-80% to-neutral-900">
        <x-section-title :text="__('key-dates.document-title')" class="px-4 md:px-12" dark/>
        <div class="w-2/3 mx-auto mt-12">
            <ul class="text-neutral-900">
                @foreach ($companies as $company)
                    <x-company-millestone :company="$company" :index="$loop->index" />
                @endforeach
            </ul>
        </div>
    </div>
</x-layout>
