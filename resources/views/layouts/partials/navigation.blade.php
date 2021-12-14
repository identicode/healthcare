<div class="navbar-expand-md">
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
                        <a class="nav-link" href="{{ route('purok') }}">
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
                        <a class="nav-link" href="{{ route('household') }}">
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
                        <a class="nav-link" href="./index.html">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <!-- Download SVG icon from http://tabler-icons.io/i/home -->
                                <x-ui.icon icon="friends" />
                            </span>
                            <span class="nav-link-title">
                                Citizen
                            </span>
                        </a>
                    </li>



                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#navbar-extra" data-bs-toggle="dropdown"
                            data-bs-auto-close="outside" role="button" aria-expanded="false">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                                <x-ui.icon icon="archive" />

                            </span>
                            <span class="nav-link-title">
                                Records
                            </span>
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="./activity.html">
                                Activity
                            </a>
                            <a class="dropdown-item" href="./gallery.html">
                                Gallery
                            </a>
                            <a class="dropdown-item" href="./invoice.html">
                                Invoice
                            </a>
                            <a class="dropdown-item" href="./search-results.html">
                                Search results
                            </a>
                            <a class="dropdown-item" href="./pricing.html">
                                Pricing cards
                            </a>
                            <a class="dropdown-item" href="./users.html">
                                Users
                            </a>
                            <a class="dropdown-item" href="./license.html">
                                License
                            </a>
                            <a class="dropdown-item" href="./music.html">
                                Music
                            </a>
                            <a class="dropdown-item" href="./widgets.html">
                                Widgets
                            </a>
                            <a class="dropdown-item" href="./wizard.html">
                                Wizard
                            </a>
                        </div>
                    </li>

                </ul>

            </div>
        </div>
    </div>
</div>
