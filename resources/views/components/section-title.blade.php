 @props(['text', 'dark' => false, 'underline' => true])

 @php
     $classes = 'mt-12 mb-6 font-semibold text-2xl lg:text-4xl ' . ($dark ? 'text-neutral-100' : 'text-neutral-900');
 @endphp

 <div {{ $attributes(['class' => $classes]) }}>
     <h2 style="font-family: Poppins">
         {{ $text }}
     </h2>
     @if ($underline)
         <div class="h-[4px] w-[96px] mt-2 {{ $dark ? 'bg-neutral-100' : 'bg-neutral-900' }}"></div>
     @endif
 </div>
