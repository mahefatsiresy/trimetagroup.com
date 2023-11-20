@props(['index', 'company'])

@if (0 === $index % 2)
    <li
        class="min-h-[142px] max-h-[150px] border border-gray-800 px-12 rounded-full grid grid-cols-[1fr_48px_1fr] gap-8 mb-4 bg-gray-100/80">
        <div class="flex items-center justify-between h-full py-4">
            <img src="{{ $company['image'] }}" alt="{{ $company['name'] }} logo" width="800" height="800"
                class="w-[156px] h-[128px] object-contain object-center" />
            <div class="self-start text-2xl font-semibold underline underline-offset-4">
                {{ $company['date'] }}
            </div>
        </div>

        <x-timeline-graph />

        <ul class="py-4 text-lg">
            @foreach ($company['abouts'] as $about)
                <li class="flex items-center gap-1 list-disc">
                    {{ $about }}
                </li>
            @endforeach
        </ul>
    </li>
@else
    <li
        class="min-h-[142px] max-h-[150px] border border-gray-800 rounded-full px-12 grid grid-cols-[1fr_48px_1fr] gap-8 mb-4 bg-gray-100/80">
        <ul class="py-4 text-lg">
            @foreach ($company['abouts'] as $about)
                <li class="flex items-center gap-1 list-disc">
                    {{ $about }}
                </li>
            @endforeach
        </ul>


        <x-timeline-graph />

        <div class="flex justify-between py-4">
            <div class="self-start text-2xl font-semibold underline underline-offset-4">
                {{ $company['date'] }}
            </div>
            <img src="{{ $company['image'] }}" alt="{{ $company['name'] }} logo" width="800" height="800"
                class="w-[156px] h-[128px] object-contain object-center" />
        </div>

    </li>
@endif
