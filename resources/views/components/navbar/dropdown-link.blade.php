@props(['trigger', 'contents', 'active' => false, 'parentRoute' => '', 'col' => 2])

<div class="relative px-4 py-2 rounded-md cursor-pointer hover:bg-neutral-800/70 group">
    <div class="{{ $active ? 'underline-offset-8 underline' : '' }} font-medium text-sm 2xl:text-base">
        {{ __('common.navbar.links.' . $trigger . '.trigger') }}
    </div>
    <ul
        class="absolute z-50 hidden grid-cols-2 p-6 shadow-sm bg-neutral-950/90 backdrop-blur-md w-[720px] group-hover:grid -left-32 rounded-xl mt-2 gap-4 border border-neutral-700">
        @foreach ($contents as $content)
            <li>
                @if (is_array($content))
                    <div class="text-sm mb-2 uppercase text-neutral-400">
                        {{ __('common.navbar.links.' . $trigger . '.' . $loop->iteration . '.' . 'title') }}
                    </div>
                    <ul>
                        @foreach ($content as $lnk)
                            <li>
                                <x-link href="{{ __('common.navbar.links.' . $trigger . '.' . $lnk . '.url') }}"
                                    class="block w-full font-medium text-sm py-2 hover:font-bold hover:underline hover:underline-offset-8">
                                    {{ __('common.navbar.links.' . $trigger . '.' . $lnk) }}
                                </x-link>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <x-link href="{{ __('common.navbar.links.' . $trigger . '.' . $content . '.url') }}"
                        class="block w-full px-4 py-2 text-sm hover:font-bold hover:underline hover:underline-offset-8">
                        {{ __('common.navbar.links.' . $trigger . '.' . $content) }}
                    </x-link>
                @endif
            </li>
        @endforeach
    </ul>
</div>
