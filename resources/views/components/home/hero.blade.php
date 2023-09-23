 <x-bg-with-motion background="/images/Groupe/groupe_10.webp">
     <section
         class="h-screen lg:min-h-[928px] w-screen flex flex-col justify-end px-6 md:px-12 bg-gradient-to-t from-gray-950/95 from-50% lg:from-40% to-gray-950/0">
         <div class="flex flex-col w-full gap-4 pb-9 md:pb-32">
             <div class="flex flex-col gap-6" id="contact-us">
                 <p class="text-gray-200 max-w-[600px] drop-shadow-sm prose md:prose-lg">
                     {{ __('home.subtitle') }}
                 </p>
             </div>
             <div class="flex flex-col justify-center mt-6 text-gray-100">
                 <h2 class="mb-4 text-lg">{{ __('home.cta') }},</h2>
                 <div class="flex flex-col gap-8 md:flex-row">
                     <div
                         class="flex items-center justify-center gap-3 px-8 py-3 font-medium text-gray-100 border border-green-700 rounded-md">
                         <Phone />
                         +261 20 22 469 42
                     </div>
                     <a href="mailto:contact@trimetagroup.mg"
                         class="flex items-center justify-center gap-3 px-8 py-3 text-gray-100 bg-green-700 border border-green-700 rounded-md hover:bg-green-700/80">
                         <Mail />
                         contact@trimetagroup.mg
                     </a>
                 </div>
             </div>
         </div>
     </section>
 </x-bg-with-motion>
