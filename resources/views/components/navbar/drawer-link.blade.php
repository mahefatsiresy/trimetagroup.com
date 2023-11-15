 @props(['trigger', 'contents', 'parentRoute' => ''])

 <h4 class="pb-2 mb-2 font-semibold border-b border-gray-500">
     {{ __('common.navbar.links.' . $trigger . '.trigger') }}
 </h4>
 <ul class="mb-4">
     @foreach ($contents as $content)
            <li>
                @if (is_array($content))
                    <div class="font-semibold mb-2">{{__('common.navbar.links.' . $trigger . '.' . $loop->iteration . '.' . 'title')}}</div>
                    <ul>
                        @foreach ($content as $lnk)
                            <li>
                                <a href="{{ $parentRoute }}/{{ $lnk }}" class="block py-2 text-gray-300">
                                    {{ __('common.navbar.links.' . $trigger . '.' . $lnk) }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <a href="{{ $parentRoute }}/{{ $content }}" class="block py-2 text-gray-300">
                        {{ __('common.navbar.links.' . $trigger . '.' . $content) }}
                    </a>
                @endif
            </li>
     @endforeach
 </ul>
