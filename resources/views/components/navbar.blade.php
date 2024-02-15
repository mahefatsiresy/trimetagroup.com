@php
    $group = ['key-dates', 'about-us', 'our-mission', 'our-values'];
    $activities = [
        'industry' => ['enduma'],
        'agro' => ['trimeta-agrofood', 'orkidex'],
        'immo' => ['wimmo'],
        'hotel' => ['alma-villas'],
    ];
@endphp

<nav class="fixed top-0 z-20 bg-neutral-950/70 backdrop-blur text-neutral-50 w-screen">
    <div class="w-full nav-container">
        <div class="flex items-center h-full gap-6 pl-4 lg:px-12 2xl:px-24 lg:justify-between">
            {{-- logo --}}
            {{-- <a href="/" class="block font-semibold text-lg" style="font-family: Poppins"> --}}
            {{-- <img src="/images/logo/groupe.png" alt="logo trimeta group" class="w-auto h-full"> --}}
            {{-- </a> --}}
            <x-link href='/' class="block font-semibold text-lg" style="font-family: Poppins">Trimeta Group</x-link>


            {{-- links --}}
            <div class="hidden gap-2 lg:flex">
                <x-navbar.dropdown-link trigger="group" :contents="$group" parentRoute="/about-us" :active="request()->routeIs('about-us')" />
                <x-navbar.dropdown-link trigger="activities" :contents="$activities" parentRoute="/activities"
                    :active="request()->routeIs('activities')" />
                <x-link :href="__('common.navbar.links.our-commitments.url')"
                    class="block px-4 py-2 rounded-md font-medium text-sm 2xl:text-base hover:bg-neutral-800/70 {{ request()->routeIs('commitments') ? 'underline underline-offset-8' : '' }}">{{ __('common.navbar.links.our-commitments') }}</x-link>
                <x-link :href="__('common.navbar.links.news.url')"
                    class="block px-4 py-2 rounded-md font-medium text-sm 2xl:text-base hover:bg-neutral-800/70 {{ request()->routeIs('news') ? 'underline underline-offset-8' : '' }}">{{ __('common.navbar.links.news') }}</x-link>
                <x-link :href="__('common.navbar.links.career.url')"
                    class="block px-4 py-2 rounded-md font-medium text-sm 2xl:text-base hover:bg-neutral-800/70 {{ request()->routeIs('career') ? 'underline underline-offset-8' : '' }}">{{ __('common.navbar.links.career') }}</x-link>
            </div>


            <div class="flex gap-4">
                {{-- lang switcher --}}
                @include('partials.language-switcher')

                <x-button class="hidden lg:inline-block"
                    href="/#contact-us">{{ __('common.navbar.links.cta') }}</x-button>
            </div>
        </div>

        {{-- <div class="lg:hidden"> --}}

        {{-- hamburger menu --}}
        <input class="checkbox" type="checkbox" />
        <div class="hamburger-lines mt-1 lg:hidden">
            <span class="line line1 bg-neutral-50"></span>
            <span class="line line2 bg-neutral-50"></span>
            <span class="line line3 bg-neutral-50"></span>
        </div>

        {{-- drawer --}}
        <div class="w-screen px-4 pt-4 list-none bg-neutral-950 text-neutral-50 menu-items">
            <x-navbar.drawer-link trigger="group" :contents="$group" parentRoute="/about-us" />
            <x-navbar.drawer-link trigger="activities" :contents="$activities" parentRoute="/activities" />
            <x-link href="/our-commitments" class="block py-2">{{ __('common.navbar.links.our-commitments') }}</x-link>
            <x-link href="/news" class="block py-2">{{ __('common.navbar.links.news') }}</x-link>
            <x-link href="/career" class="block py-2">{{ __('common.navbar.links.career') }}</x-link>
        </div>
    </div>
</nav>
