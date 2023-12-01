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
                'certifications' => [3, 2],
                'products' => ['/images/Enduma/enduma-product-1.webp', '/images/Enduma/enduma-product-2.webp', '/images/Enduma/enduma-product-3.webp', '/images/Enduma/enduma-product-5.webp']
            ];
            break;
        case 'trimeta-agrofood':
            $companyData = [
                'descriptionCount' => 2,
                'detailsDesc' => [1, 1],
                'detailsImg' => [0, 0],
                'certifications' => [3, 5],
                'products' => []
            ];
            break;
        case 'wimmo':
            $companyData = [
                'descriptionCount' => 2,
                'detailsDesc' => [1, 0, 0, 0, 0],
                'detailsImg' => [0, 0, 0, 0, 0],
                'certifications' => [0, 0],
                'products' => []

            ];
            break;
        case 'millot':
            $companyData = [
                'descriptionCount' => 3,
                'detailsDesc' => [0, 0, 0],
                'detailsImg' => [0, 0, 0],
                'certifications' => [0, 0],
                'products' => []

            ];
            break;
        case 'orkidex':
            $companyData = [
                'descriptionCount' => 2,
                'detailsDesc' => [1],
                'detailsImg' => [0],
                'certifications' => [0, 0],
                'products' => []

            ];
            break;
        case 'alma-villas':
            $companyData = [
                'descriptionCount' => 4,
                'detailsDesc' => [],
                'detailsImg' => [],
                'certifications' => [0, 0],
                'products' => ['/images/alma/alma-villas-product.webp','/images/alma/alma-villas-product-2.webp','/images/alma/alma-villas-product-3.webp']

            ];
            break;
        default:
            throw Error('slug not recognized');
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

    $certifications = [
        'descriptions' => [],
        'images' => [],
    ];

    if (count($companyData['certifications'])) {
        for ($i = 0; $i < $companyData['certifications'][0]; $i++) {
            $certifications['descriptions'][] = __("{$slug}.certifications.descriptions.{$numberLetter[$i]}");
        }

        for ($i = 0; $i < $companyData['certifications'][1]; $i++) {
           $certifications['images'][] = __("{$slug}.certifications.images.{$numberLetter[$i]}");
        }
    }

    $contacts = array_map(
        function ($key) use ($slug) {
            if (__("{$slug}.contacts.{$key}") !== "{$slug}.contacts.{$key}") {
                return [
                    'key' => __("{$slug}.contacts.{$key}"),
                    'value' => __("{$slug}.contacts.{$key}.value"),
                ];
            }
            return null;
        },
        ['phone', 'email', 'address', 'web'],
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
        <ul class="grid md:grid-cols-2 gap-4 mt-8 items-start">
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


    @if (0 !== count($contacts))
        <x-section-title text="Contacts" dark/>
        <div class="flex w-full md: grap mt-12 pb-8">
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
                            @else
                                {{ $contact['value'] }}
                            @endif
                        </li>
                    @endif
                @endforeach
            </ul>
        </div>
    @endif

</x-fullpage-card>

@if (0 !== count($companyData['products']))
<section class="bg-gradient-to-tr from-neutral-950 to-neutral-900 py-8 px-4 md:px-12 2xl:px-24">
    <x-section-title text="Products" dark/>
    <ul class="grid md:grid-cols-2 gap-4 lg:grid-cols-3">
        @foreach($companyData['products'] as $product)
        <li class="relative h-[320px]">
            <img src="{{$product}}" alt="{{$slug}} product" class="w-full h-full object-cover object-bottom bg-neutral-800"/>
            {{-- <div class="absolute inset-0 flex items-end justify-center bg-gradient-to-t from-neutral-950/80 from-20% text-neutral-50 p-4"> --}}
            {{--     Product name --}}
            {{-- </div> --}}
        </li>
        @endforeach
    </ul>
</section>
@endif

{{-- certifications --}}
@if (0 !== count($certifications['descriptions']) || 0 !== count($certifications['images']))
<section class="bg-gradient-to-tr from-neutral-950 to-neutral-900 py-8 px-4 md:px-12 2xl:px-24">
    <x-section-title text="Certifications" dark/>
        @if (0 !== count($certifications['descriptions']))
            <ul class="pt-4 pl-4 list-disc">
                @foreach ($certifications['descriptions'] as $description)
                    <li class="text-neutral-400 mb-2 font-normal w-2/3">
                        {{ $description }}
                    </li>
                @endforeach
            </ul>
        @endif

        @if (0 !== count($certifications['images']))
            <ul class="pt-4 grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4 md:gap-12 mt-8 w-fit">
                @foreach ($certifications['images'] as $img)
                    <li class="w-fit">
                        <img src={{ $img }} alt="detail image" width="400" height="400" class='object-contain w-full h-[160px]'/>
                    </li>
                @endforeach
            </ul>
        @endif
</section>
@endif

