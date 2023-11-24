 @props(['text', 'dark' => false, 'underline' => true])

 @php
     $classes = 'mt-12 mb-8 font-semibold text-2xl md:text-4xl lg:text-4xl w-fit mx-auto ' . ($dark ? 'text-neutral-100' : 'text-neutral-900');
 @endphp

 <div {{ $attributes(['class' => $classes]) }}>
     <h2 style="font-family: Poppins">
         {{ $text }}
     </h2>
     @if ($underline)
         <div class="h-[4px] w-1/2 mt-4 mx-auto {{ $dark ? 'bg-neutral-100' : 'bg-neutral-900' }}"></div>
     @endif
 </div>
