<div class="col-12">
    <x-ui.card title="Account">

        @include('layouts.partials.alerts')

        <form wire:submit.prevent='save'>
            <div class="row">
                <div class="col-12">
                    <x-ui.form.input label="Username" wire:model.lazy="username" />
                </div>
            </div>

            <div class="row">

                <div class="col-12">
                    <x-ui.form.input label="Old Password" type="password" wire:model.lazy="password_old" />
                </div>

                <div class="col-6">
                    <x-ui.form.input label="New Password" type="password" wire:model.lazy="password" />
                </div>
                <div class="col-6">
                    <x-ui.form.input label="Confirm Password" type="password" wire:model.lazy="password_confirmation" />
                </div>
            </div>


            <button class="btn btn-primary">Save</button>
        </form>
    </x-ui.card>
</div>
