<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Flex') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <meta name="description" content="Flexible living made easy. Premium furnished apartments worldwide.">
</head>
<body class="antialiased bg-white text-gray-900">
    @include('partials.header')
    @include('partials.hero')
    @include('partials.content')
    @include('partials.footer')
</body>
</html>
