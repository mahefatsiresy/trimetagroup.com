@props(['trigger', 'contents', 'active' => false, 'parentRoute' => ''])

<div class="relative px-4 py-2 font-medium rounded-md cursor-pointer hover:bg-gray-800/70 group">
    <div class="{{ $active ? 'text-green-400' : '' }}">
        {{ __('common.navbar.links.' . $trigger . '.trigger') }}</div>
    <ul
        class="absolute z-50 hidden grid-cols-2 p-6 shadow-sm bg-gray-950/90 backdrop-blur-md w-[640px] group-hover:grid -left-32 rounded-xl mt-2 gap-4 border border-gray-700">
        @foreach ($contents as $content)
            <li>
                <a href="{{ $parentRoute }}/{{ $content }}"
                    class="block w-full px-4 py-2 hover:font-bold hover:text-green-400">
                    {{ __('common.navbar.links.' . $trigger . '.' . $content) }}
                </a>
            </li>
        @endforeach
    </ul>
</div>
