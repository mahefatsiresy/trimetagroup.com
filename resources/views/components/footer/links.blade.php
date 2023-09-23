 @props(['trigger', 'contents', 'parentRoute' => ''])
 <dl>
     <dt class="mb-2 font-semibold">
         {{ __('common.navbar.links.' . $trigger . '.trigger') }}
     </dt>
     <dd>
         <ul>
             @foreach ($contents as $content)
                 <li class="mb-1">
                     <a href="{{ $parentRoute }}/{{ $content }}" class="hover:underline">
                         {{ __('common.navbar.links.' . $trigger . '.' . $content) }}
                     </a>
                 </li>
             @endforeach
         </ul>
     </dd>
 </dl>
