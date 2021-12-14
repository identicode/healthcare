<!doctype html>
<html lang="en">

<head>

    @include('layouts.partials.meta')

    <title>{{ env('APP_NAME') }}</title>

    @include('layouts.partials.styles')
</head>

<body class="d-flex flex-column">

    {{ $slot ?? '' }}


    <!-- Libs JS -->
    <!-- Tabler Core -->
    @include('layouts.partials.scripts')

</body>

</html>
