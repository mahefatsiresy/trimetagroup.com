@props(['title' => '', 'description' => '', 'path' => ''])
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ '' === $title ? __('common.document-title') : $title . ' - ' . __('common.document-title') }}</title>
    <meta name="description" content="{{$description}}">
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600&display=swap"
        rel="stylesheet">
    <link rel="canonical" href="https://trimetagroup.com{{'en' === app()->getLocale() ? '/en' : ''}}{{$path}}">
</head>

<body style="font-family: Inter, sans-serif;" class="overflow-x-hidden">
    <x-navbar />
    {{ $slot }}
    <x-footer />
    <script src="{{ asset('js/motion.js') }}"></script>
</body>

</html>
