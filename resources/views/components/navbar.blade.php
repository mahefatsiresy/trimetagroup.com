@php
    // $group = ['ceo-words', 'our-history', 'key-dates', 'our-ethical-charter'];
    $group = ['key-dates'];
    $activities = [
        "industry" => ['enduma'],
        "agro" => ['trimeta-agrofood', 'millot', 'orkidex'],
        "immo" => ['wimmo'],
        "hotel" => ['alma-villas']
    ];
@endphp

<nav class="fixed top-0 z-20 bg-gray-950/90 backdrop-blur text-gray-50 w-screen">
    <div class="w-full nav-container">
        <div class="flex items-center h-full gap-6 pl-4 lg:px-12 lg:justify-between">
            {{-- logo --}}
            <a href="/" class="block font-semibold text-lg" style="font-family: Poppins">
                {{-- <img src="/images/logo/groupe.png" alt="logo trimeta group" class="w-auto h-full"> --}} Trimeta Group
            </a>


            {{-- links --}}
            <div class="hidden gap-2 lg:flex">
                <x-navbar.dropdown-link trigger="group" :contents="$group" parentRoute="/about-us" :active="request()->routeIs('about-us')" />
                <x-navbar.dropdown-link trigger="activities" :contents="$activities" parentRoute="/activities"
                    :active="request()->routeIs('activities')" />
                <a href="/our-commitments"
                    class="block px-4 py-2 rounded-md hover:bg-gray-800/70 {{ request()->routeIs('commitments') ? 'text-green-400' : '' }}">{{ __('common.navbar.links.our-commitments') }}</a>
                <a href="/news"
                    class="block px-4 py-2 rounded-md hover:bg-gray-800/70 {{ request()->routeIs('news') ? 'text-green-400' : '' }}">{{ __('common.navbar.links.news') }}</a>
                <a href="/career"
                    class="block px-4 py-2 rounded-md hover:bg-gray-800/70 {{ request()->routeIs('career') ? 'text-green-400' : '' }}">{{ __('common.navbar.links.career') }}</a>
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
                <span class="line line1 bg-gray-50"></span>
                <span class="line line2 bg-gray-50"></span>
                <span class="line line3 bg-gray-50"></span>
            </div>

            {{-- drawer --}}
            <div class="w-screen px-4 pt-4 list-none bg-gray-950 text-gray-50 menu-items">
                <x-navbar.drawer-link trigger="group" :contents="$group" parentRoute="/about-us" />
                <x-navbar.drawer-link trigger="activities" :contents="$activities" parentRoute="/activities" />
                <a href="/our-commitments" class="block py-2">{{ __('common.navbar.links.our-commitments') }}</a>
                <a href="/news" class="block py-2">{{ __('common.navbar.links.news') }}</a>
                <a href="/career" class="block py-2">{{ __('common.navbar.links.career') }}</a>
            </div>
        {{-- </div> --}}
    </div>
</nav>
