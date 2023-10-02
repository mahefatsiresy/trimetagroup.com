@php
    
    function getCommitmentsdata($key, $descs)
    {
        $numberLetter = ['one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight'];
    
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
    
@endphp

<x-layout :title="__('commitments.document-title')">

    <article>

        <x-fullpage-card class="bg-gray-100" :image="$environmentCommitments['image']" index="1">
            <div class="mt-16">
                <x-section-title :text="$environmentCommitments['title']" />
                <ul class="lg:max-w-[700px] pr-4 pb-4">
                    @foreach ($environmentCommitments['descriptions'] as $desc)
                        <li class="prose md:prose-lg mb-4 list-disc ml-4 max-w-[600px]">
                            {{ $desc }}
                        </li>
                    @endforeach
                </ul>
            </div>
        </x-fullpage-card>

        <x-fullpage-card class="bg-gray-100" :image="$societalCommitments['image']" index="2">
            <div class="mt-16">
                <x-section-title :text="$societalCommitments['title']" />
                <ul class="lg:max-w-[700px] pr-4 pb-4">
                    @foreach ($societalCommitments['descriptions'] as $desc)
                        <li class="prose md:prose-lg mb-4 list-disc ml-4 max-w-[600px]">
                            {{ $desc }}
                        </li>
                    @endforeach
                </ul>
            </div>
        </x-fullpage-card>

        <section class="w-full px-4 pb-16 md:px-12">
            <x-section-title :text="__('commitments.csr-projects.title')" />
            <ul class="grid gap-8 mt-8 text-slate-700 justify-items-start md:grid-cols-2">
                @foreach ($csrData['categories'] as $category)
                    <li class="mb-6">
                        <h3 class="mb-4 text-lg font-bold text-green-600 uppercase rounded-md">
                            {{ $category['title'] }}
                        </h3>
                        <ul class="pl-4">
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
</x-layout>
