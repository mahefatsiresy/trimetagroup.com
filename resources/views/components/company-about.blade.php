@props(['slug'])

@php

    $numberLetter = ['one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight'];

    $companyData = [];
    switch ($slug) {
        case 'enduma':
            $companyData = [
                'descriptionCount' => 2,
                'detailsDesc' => [0, 0, 0],
                'detailsImg' => [0, 0, 0],
                'certifications' => 3,
                'other-image' => [0, 0, 0],
                'products' => 7
            ];
            break;
        case 'trimeta-agrofood':
            $companyData = [
                'descriptionCount' => 2,
                'detailsDesc' => [1, 1],
                'detailsImg' => [0, 0],
                'certifications' => 3,
                'other-image' => [2, 0, 0],
                'products' => 6
            ];
            break;
        case 'wimmo':
            $companyData = [
                'descriptionCount' => 2,
                'detailsDesc' => [1, 0, 0, 0, 0],
                'detailsImg' => [0, 0, 0, 0, 0],
                'certifications' => 0,
                'other-image' => [],
                'products' => 5

            ];
            break;
        // case 'millot':
           //  $companyData = [
               //  'descriptionCount' => 3,
               //  'detailsDesc' => [0, 0, 0],
                // 'detailsImg' => [0, 0, 0],
                // 'certifications' => [0, 0, 0],
                //'products' => 0
                //'products' => []

            //];
            // break;
        case 'orkidex':
            $companyData = [
                'descriptionCount' => 2,
                'detailsDesc' => [1],
                'detailsImg' => [0],
                'certifications' => 2,
                'other-image' => [],
                'products' => 0,
                //'products' => []

            ];
            break;
        case 'alma-villas':
            $companyData = [
                'descriptionCount' => 4,
                'detailsDesc' => [],
                'detailsImg' => [],
                'certifications' => 0,
                'other-image' => [],
                'products' => 3

            ];
            break;
        default:
            $companyData = [];
            break;
    }


    $name = __("{$slug}.name");
    $logo = __("{$slug}.logo");
    $date = __("{$slug}.data");
    $background = __("{$slug}.background");

    $descriptions = array_map(function ($i) use ($slug, $numberLetter) {
        return __("{$slug}.description.{$numberLetter[$i]}");
    }, range(0, $companyData['descriptionCount'] - 1));

    $detailsCount = count($companyData['detailsDesc']) === 0 ? 0 : count($companyData['detailsDesc']) - 1;

    $details = [];

    if ($detailsCount) {
        $details = array_map(function ($num) use ($slug, $numberLetter, $companyData) {
            $details = [
                'icon' => __("{$slug}.details.{$numberLetter[$num]}.icon"),
                'title' => __("{$slug}.details.{$numberLetter[$num]}.title"),
                'descriptions' => [],
                'images' => [],
            ];

            for ($i = 0; $i < $companyData['detailsDesc'][$num]; $i++) {
                $details['descriptions'][] = __("{$slug}.details.{$numberLetter[$num]}.descriptions.{$numberLetter[$i]}");
            }

            for ($i = 0; $i < $companyData['detailsImg'][$num]; $i++) {
                $details['images'][] = __("{$slug}.details.{$numberLetter[$num]}.images.{$numberLetter[$i]}");
            }

            return $details;
        }, range(0, $detailsCount));
    }

    $certifications = [];

    if ($companyData['certifications']) {


        for ($i = 0; $i < $companyData['certifications']; $i++) {
            $otherImages = [];

            if (count($companyData['other-image']) > 0) {
                for ($j = 0; $j < $companyData['other-image'][$i]; $j++) {
                    $otherImages[] = __("{$slug}.certifications.{$numberLetter[$i]}.images.{$numberLetter[$j]}");
                }
            }

            $certifications[] = [
                'title' => __("{$slug}.certifications.{$numberLetter[$i]}.title"),
                'descriptions' => __("{$slug}.certifications.{$numberLetter[$i]}.descriptions") === "{$slug}.certifications.{$numberLetter[$i]}.descriptions" ? null : __("{$slug}.certifications.{$numberLetter[$i]}.descriptions"),
                'images' => __("{$slug}.certifications.{$numberLetter[$i]}.images"),
                'other-image' => $otherImages,
            ];
        }

        //for ($i = 0; $i < $companyData['certifications'][1]; $i++) {
           //$certifications['images'][] = [
            //   'image' => __("{$slug}.certifications.images.{$numberLetter[$i]}"),
           //    'desc' => __("{$slug}.certifications.images.{$numberLetter[$i]}.desc") === "{$slug}.certifications.images.{$numberLetter[$i]}.desc" ? '' : __("{$slug}.certifications.images.{$numberLetter[$i]}.desc"),
          // ];
        //}
    }

    $contacts = array_map(
        function ($key) use ($slug) {
            if (__("{$slug}.contacts.{$key}") !== "{$slug}.contacts.{$key}") {
                return [
                    'key' => __("{$slug}.contacts.{$key}"),
                    'value' => __("{$slug}.contacts.{$key}.value"),
                    'link' => __("{$slug}.contacts.{$key}.link"),
                ];
            }
            return null;
        },
        ['phone', 'email', 'address', 'web', 'facebook', 'linkedin', 'instagram'],
    );

@endphp

<x-fullpage-card :image="$background" index="0" dark>
    <div class="mb-4 lg:max-w-[700px] pt-16 pr-4 md:pr-12">
        {{-- logo --}}
        <img src="{{ $logo }}" alt="{{ $name }} logo" class="h-[96px] mb-6" />

        {{-- descriptions --}}
        @foreach ($descriptions as $description)
            <p class="text-lg mb-8 drop-shadow text-neutral-200 max-w-[600px]">
                {{ $description }}
            </p>
        @endforeach
    </div>

    {{-- details --}}
    @if (0 !== count($details))
        <x-section-title :text="__('common.company-about.key-figures')" dark/>
        <ul class="grid md:grid-cols-2 gap-4 mt-8 items-start pb-8">
            @foreach ($details as $detail)
                <li class="flex flex-col gap-2 lg:text-lg font-semibold text-neutral-200">
                    <div class="flex items-center gap-4">
                        <img class="w-[40px] h-[40px] bg-neutral-200 rounded-full" src="{{ $detail['icon'] }}" alt="icon" width="80"
                            height="80" />
                        <span>{{ $detail['title'] }}</span>
                    </div>

                    @if ($detail['descriptions'] && 0 !== $detail['descriptions'])
                        <ul class="pl-8 pt-4">
                            @foreach ($detail['descriptions'] as $description)
                                <li class="text-sm text-neutral-400 mb-2 font-normal w-2/3">
                                    {{ $description }}
                                </li>
                            @endforeach
                        </ul>
                    @endif

                    @if ($detail['images'] && 0 !== $detail['images'])
                        <ul class="pl-8 pt-4 flex gap-2">
                            @foreach ($detail['images'] as $img)
                                <li>
                                    <img src={{ $img }} alt="detail image" width="400" height="400"
                                        class="w-[40px] h-[40px] object-contain" />
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </li>
            @endforeach
        </ul>
    @endif
</x-fullpage-card>

@if (0 !== $companyData['products'])
<section class="bg-gradient-to-tr from-neutral-950 to-neutral-900 py-8 px-4 md:px-12 2xl:px-24">
    <x-section-title :text="__('common.company.products')" dark/>
    <ul class="grid md:grid-cols-2 gap-8 lg:grid-cols-3">
        @for($i = 0; $i < $companyData['products']; $i++)
        <li class="h-[320px]">
            <div class="text-neutral-100 text-center pb-2">{{__("{$slug}.products.{$numberLetter[$i]}.name")}}</div>
            <img src='{{__("{$slug}.products.{$numberLetter[$i]}.image")}}' alt="{{$slug}} product" class="w-full h-[296px] object-cover object-bottom bg-neutral-800"/>
        </li>
        @endfor
    </ul>
</section>
@endif

{{-- certifications --}}
@if (0 !== count($certifications))
<section class="bg-gradient-to-tr from-neutral-950 to-neutral-900 py-8 px-4 md:px-12 2xl:px-24">
    <x-section-title text="Certifications" dark/>
            <ul class="pt-4 lg:pt-8 grid w-full gap-8 lg:gap-y-12 2xl:grid-cols-2">
                @foreach ($certifications as $cert)
                    <li class="flex flex-col lg:flex-row gap-4 lg:gap-8">
                            <div class="grid gap-2 grid-cols-3 lg:grid-cols-1">
                                <img src={{ $cert['images'] }} alt="detail image" width="400" height="400" class='inline-block object-contain w-fit h-[196px]'/>
                                @if (count($cert['other-image']) !== 0)
                                @foreach ($cert['other-image'] as $oi)
                                    <img src={{ $oi }} alt="detail image" width="400" height="400" class='inline-block object-contain w-fit h-[196px]'/>
                                @endforeach
                                @endif
                            </div>
                            <div class="prose lg:prose-lg text-neutral-300">
                                <h3 class='text-neutral-100'>{{$cert['title']}}</h4>
                                @if ($cert['descriptions'])
                                    {!! $cert['descriptions'] !!}
                                @endif
                            </div>
                    </li>
                @endforeach
            </ul>
</section>
@endif

{{-- contacts --}}
@if (0 !== count($contacts))
<section class="bg-gradient-to-tr from-neutral-950 to-neutral-900 py-8 px-4 md:px-12 2xl:px-24">
    <x-section-title text="Contacts" dark/>
    <div class="w-fit mx-auto mt-12 pb-8">
        <ul aria-label="contacts"
            class="grid justify-items-start gap-6 gap-x-12 lg:gap-12 md:grid-cols-2 w-fit md:text-lg text-neutral-200">
            @foreach ($contacts as $contact)
                @if ($contact)
                    <li class="flex gap-4 lg:gap-2 items-center">
                        <x-contact-icon :index="$loop->index" />
                        @if ('web' === $contact['key'])
                            <a href="https://{{ $contact['value'] }}" target="_blank"
                                class="hover:underline hover:text-blue-400">
                                {{ $contact['value'] }}
                            </a>
                        @elseif ('facebook' === $contact['key'] || 'linkedin' === $contact['key']|| 'instagram' === $contact['key'])
                            <a href="{{ $contact['link'] }}" target="_blank"
                                class="hover:underline hover:text-blue-400">
                                {{ $contact['value'] }}
                            </a>
                        @else
                            {{ $contact['value'] }}
                        @endif
                    </li>
                @endif
            @endforeach
        </ul>
    </div>
</section>
@endif
