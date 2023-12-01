@props(['index', 'company'])

@if (0 === $index % 2)
    <li
        class="md:h-[240px] md:min-h-[142px] border border-neutral-800 px-6 md:px-12 md:rounded-full md:grid grid-cols-[1fr_48px_1fr] gap-4 md:gap-8 mb-4 md:bg-neutral-100/80">
        <div class="flex items-center justify-between h-full py-4">
            <img src="{{ $company['image'] }}" alt="{{ $company['name'] }} logo" width="800" height="800"
                class="w-[156px] h-[128px] object-contain object-center" />
            <div class="self-start text-2xl font-semibold underline underline-offset-4">
                {{ $company['date'] }}
            </div>
        </div>

        <div class='hidden md:block'>
            <x-timeline-graph />
        </div>

        <ul class="py-4 lg:py-8 text-lg">
            @foreach ($company['abouts'] as $about)
                <li class="flex items-center gap-1 list-disc">
                    {{ $about }}
                </li>
            @endforeach
        </ul>
    </li>
@else
    <li
        class="md:h-[240px] md:min-h-[142px] border border-neutral-800 md:rounded-full px-6 md:px-12 grid md:grid-cols-[1fr_48px_1fr] gap-4 md:gap-8 mb-4 md:bg-neutral-100/80">
        <div class="flex items-center justify-between h-full py-4 md:hidden">
            <img src="{{ $company['image'] }}" alt="{{ $company['name'] }} logo" width="800" height="800"
                class="w-[156px] h-[128px] object-contain object-center" />
            <div class="self-start text-2xl font-semibold underline underline-offset-4">
                {{ $company['date'] }}
            </div>
        </div>

        <ul class="py-4 text-lg md:hidden">
            @foreach ($company['abouts'] as $about)
                <li class="flex items-center gap-1 list-disc">
                    {{ $about }}
                </li>
            @endforeach
        </ul>

        {{-- // hidden on small screen --}}
        <ul class="py-4  lg:py-8 text-lg hidden md:block">
            @foreach ($company['abouts'] as $about)
                <li class="flex items-center gap-1 list-disc">
                    {{ $about }}
                </li>
            @endforeach
        </ul>

        <div class='hidden md:block'>
            <x-timeline-graph />
        </div>

        <div class="justify-between py-4 hidden md:flex">
            <div class="self-start text-2xl font-semibold underline underline-offset-4">
                {{ $company['date'] }}
            </div>
            <img src="{{ $company['image'] }}" alt="{{ $company['name'] }} logo" width="800" height="800"
                class="w-[156px] h-[128px] object-contain object-center" />
        </div>

    </li>
@endif
