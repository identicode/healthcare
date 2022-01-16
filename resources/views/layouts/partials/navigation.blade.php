<div class="navbar-expand-md d-print-none">
    <div class="collapse navbar-collapse" id="navbar-menu">
        <div class="navbar navbar-light">
            <div class="container-xl">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard') }}">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <!-- Download SVG icon from http://tabler-icons.io/i/home -->
                                <x-ui.icon icon="dashboard" />
                            </span>
                            <span class="nav-link-title">
                                Dashboard
                            </span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('purok.index') }}">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <!-- Download SVG icon from http://tabler-icons.io/i/home -->
                                <x-ui.icon icon="map-2" />
                            </span>
                            <span class="nav-link-title">
                                Purok
                            </span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('household.index') }}">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <!-- Download SVG icon from http://tabler-icons.io/i/home -->
                                <x-ui.icon icon="home" />
                            </span>
                            <span class="nav-link-title">
                                Households
                            </span>
                        </a>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('citizen.index') }}">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <!-- Download SVG icon from http://tabler-icons.io/i/home -->
                                <x-ui.icon icon="friends" />
                            </span>
                            <span class="nav-link-title">
                                Citizen
                            </span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('appointment.index') }}">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <!-- Download SVG icon from http://tabler-icons.io/i/home -->
                                <x-ui.icon icon="calendar-plus" />
                            </span>
                            <span class="nav-link-title">
                                Appointments
                            </span>
                        </a>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('report') }}">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <!-- Download SVG icon from http://tabler-icons.io/i/home -->
                                <x-ui.icon icon="report-medical" />
                            </span>
                            <span class="nav-link-title">
                                Reports & Analytics
                            </span>
                        </a>
                    </li>

                </ul>

            </div>
        </div>
    </div>
</div>
