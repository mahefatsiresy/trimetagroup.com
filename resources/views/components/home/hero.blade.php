 <x-bg-with-motion background="/images/hero.webp">
    <section class="h-screen w-screen flex flex-col justify-center px-6 md:px-12 bg-gradient-to-t from-neutral-950/80 from-50% lg:from-40% to-neutral-950/0">
        <div class="flex items-center justify-center w-full gap-4">
            <div>
                <x-section-title :text="__('home.about-us')" class="!mt-0" dark />
                <p class="text-neutral-200 max-w-[640px] drop-shadow-sm prose-lg md:prose-2xl font-medium">
                    {{ __('home.subtitle') }}
                </p>
            <div>
        </div>
    </section>
 </x-bg-with-motion>
