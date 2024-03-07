@php

    $numberLetter = ['one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight'];

    $companies = [['Alma Villas', 1], ['Wimmo', 1], ['Orkidex', 1], ['Millot', 2], ['Trimeta Finance', 1], ['Biosave', 1], ['Trimeta Agrofood', 2], ['Vanille Mad', 2], ['SIM', 1], ['Enduma', 1]];

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

<x-layout :title="__('key-dates.document-title')" :description="__('key-dates.meta-description')" path={{$path}}>
    <div class="pt-24 pb-24 overflow-x-hidden bg-gradient-to-tl from-neutral-950 from-80% to-neutral-900">
        <x-section-title :text="__('key-dates.document-title')" class="px-4 md:px-12" dark/>
        <ul class="w-full px-4 lg:px-12 lg:w-6/7 lg:max-w-6xl mx-auto mt-12 text-neutral-300 md:text-neutral-900">
                @foreach ($companies as $company)
                    <x-company-millestone :company="$company" :index="$loop->index" />
                @endforeach
        </ul>
    </div>
</x-layout>
