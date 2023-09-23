 @props(['trigger', 'contents', 'parentRoute' => ''])

 <h4 class="pb-2 mb-2 font-semibold border-b border-gray-500">
     {{ __('common.navbar.links.' . $trigger . '.trigger') }}
 </h4>
 <ul class="mb-4">
     @foreach ($contents as $content)
         <li>
             <a href="{{ $parentRoute }}/{{ $content }}" class="block py-2 text-gray-300">
                 {{ __('common.navbar.links.' . $trigger . '.' . $content) }}
             </a>
         </li>
     @endforeach
 </ul>
