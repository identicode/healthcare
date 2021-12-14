<div class="page page-center">
    <div class="container-tight py-4">
        <div class="text-center mb-4">
            <h2 class="navbar-brand-autodark">Barangay Health Center Information System</h2>
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
            Project By:
        </div>
    </div>
</div>
