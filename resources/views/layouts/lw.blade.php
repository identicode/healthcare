<!doctype html>
<html lang="en">

<head>

    @include('layouts.partials.meta')

    <title>MY TITLE</title>

    @include('layouts.partials.styles')


</head>

<body>
    <div class="wrapper">

        @include('layouts.partials.header')
        @include('layouts.partials.navigation')


        <div class="page-wrapper">
            <div class="container-xl">
                <!-- Page title -->
                <div class="page-header d-print-none">
                    <div class="row align-items-center">
                        <div class="col">
                            <!-- Page pre-title -->
                            <div class="page-pretitle">
                                {{ $_pretitle ?? '' }}
                            </div>
                            <h2 class="page-title">
                                {{ $_title ?? '' }}

                            </h2>
                        </div>
                        <!-- Page title actions -->
                        <div class="col-auto ms-auto d-print-none">
                            {{ $_actions ?? '' }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="page-body">
                <div class="container-xl">
                    <!-- Content here -->

                    @include('layouts.partials.alerts')

                    @section('content')
                    @show

                    {{ $slot }}

                </div>
            </div>
            @include('layouts.partials.footer')

        </div>
    </div>
    <!-- Libs JS -->
    <!-- Tabler Core -->
    @include('layouts.partials.scripts')

</body>

</html>
