<div class="page page-center">
    <div class="container-tight py-4">
        <div class="text-center mb-4">

            <img src="{{ asset('img/logos/ascot.jpg') }}" alt="" width="100" height="100">
            <img src="{{ asset('img/logos/bayanihan_1.png') }}" alt="" width="100" height="100">

            <h2 class="navbar-brand-autodark mt-3">Barangay Health Center Information System</h2>
        </div>

        <form class="card card-md" wire:submit.prevent="login" method="get" autocomplete="off">

            <div class="card-body">
                <h2 class="card-title text-center mb-4">Login to your account</h2>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        {{ $errors->first() }}
                    </div>
                @endif


                <x-ui.form.input wire:model.lazy="username" label="Enter username" />
                <x-ui.form.input wire:model.lazy="password" label="Enter password" type="password" />


                <div class="form-footer">
                    <button type="submit" class="btn btn-primary w-100">Sign in</button>
                </div>
            </div>

        </form>
        <div class="text-center text-muted mt-3">

            <p>Project By:</p>

            <ul class="list-unstyled">
                <li>John David L. Fernandez</li>
                <li>Ronalyn A. Avellano</li>
                <li>Armida C. Maruhum</li>
                <li>Roshelle C. Esquierda</li>
            </ul>

            <p>Advisor:</p>
            <ul class="list-unstyled">
                <li>King Alvin Grospe</li>
            </ul>


        </div>
    </div>
</div>
