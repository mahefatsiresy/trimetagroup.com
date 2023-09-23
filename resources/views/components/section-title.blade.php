 @props(['text', 'dark' => false, 'underline' => true])

 @php
     $classes = 'mt-12 mb-6 font-semibold text-2xl lg:text-4xl ' . ($dark ? 'text-gray-100' : 'text-gray-900');
 @endphp

 <div {{ $attributes(['class' => $classes]) }}>
     <h2 style="font-family: Poppins">
         {{ $text }}
     </h2>
     @if ($underline)
         <div class="h-[4px] w-[96px] mt-2 {{ $dark ? 'bg-gray-100' : 'bg-gray-900' }}"></div>
     @endif
 </div>
