<header class="navbar navbar-expand-md navbar-light d-print-none">
    <div class="container-xl">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu">
            <span class="navbar-toggler-icon"></span>
        </button>


        <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
            <img src="{{ asset('img/logos/bayanihan_2.png') }}" alt="" width="32" height="30">
            <span> Barangay Health Center Information System - (Brgy. Bayanihan)</span>
        </h1>
        <div class="navbar-nav flex-row order-md-last">




            <div class="nav-item dropdown">
                <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown"
                    aria-label="Open user menu">
                    <span class="avatar avatar-sm">
                        {{ name(auth()->user()->name, 'SYM-FL') }}
                    </span>
                    <div class="d-none d-xl-block ps-2">
                        <div>{{ name(auth()->user()->name) }}</div>
                        <div class="mt-1 small text-muted">{{ '@' . auth()->user()->username }}</div>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">

                    <a href="?theme=dark" class="dropdown-item hide-theme-dark">
                        Dark mode
                    </a>

                    <a href="?theme=light" class="dropdown-item hide-theme-light">
                        Light mode
                    </a>





                    <a href="{{ route('profile') }}" class="dropdown-item">
                        Profile
                    </a>

                    @role('admin')

                    @livewire('dump')


                    <a href="{{ route('users.index') }}" class="dropdown-item">
                        Users
                    </a>

                    @endrole



                    <div class="dropdown-divider"></div>
                    {{-- <a href="#" class="dropdown-item">Settings</a> --}}

                    @livewire('auth.logout')
                </div>
            </div>
        </div>
    </div>
</header>
