 <div x-data="{ show: false }" @click.away="show = false">

     <div @click="show = !show" class="flex items-center gap-2 px-3 py-2 cursor-pointer">
         <div class="uppercase">{{ $current_locale }}</div>
         <svg fill="#f9fafffb" height="12px" width="12px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
             xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 330 330" xml:space="preserve" stroke="#f9fafffb">
             <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
             <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
             <g id="SVGRepo_iconCarrier">
                 <path id="XMLID_225_"
                     d="M325.607,79.393c-5.857-5.857-15.355-5.858-21.213,0.001l-139.39,139.393L25.607,79.393 c-5.857-5.857-15.355-5.858-21.213,0.001c-5.858,5.858-5.858,15.355,0,21.213l150.004,150c2.813,2.813,6.628,4.393,10.606,4.393 s7.794-1.581,10.606-4.394l149.996-150C331.465,94.749,331.465,85.251,325.607,79.393z">
                 </path>
             </g>
         </svg>

     </div>

     <div x-show="show" class="absolute z-50 w-24 pt-4 rounded-md bg-neutral-950 text-neutral-50" style="display: none">
         @foreach ($available_locales as $locale_name => $locale_value)
             <a href="/lang/{{ $locale_value }}"
                 class="block px-3 py-4 hover:underline hover:underline-offset-8 hover:font-semibold">{{ $locale_name }}</a>
         @endforeach
     </div>

 </div>
