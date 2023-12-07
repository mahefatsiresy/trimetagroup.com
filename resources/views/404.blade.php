<x-layout title="404 Error">
    <section class="grid place-items-center h-[80vh] bg-gradient-to-tl from-neutral-950 to-neutral-900">
        <div class="prose flex flex-col items-center">
            <h1 class="text-neutral-100 !mb-0">404 Error</h1>
            <p class="text-neutral-200 mb-8">{{__("common.sorry-not-found")}}</p>
            <x-button href="/">{{__("common.go-home")}}</x-button>
        </div>
    </section>
</x-layout>
