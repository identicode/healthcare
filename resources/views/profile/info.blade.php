<div class="col-12">
    <x-ui.card title="Information">

        @include('layouts.partials.alerts')

        <form wire:submit.prevent='save'>
            <div class="row">
                <div class="col-6">
                    <x-ui.form.input label="First Name" wire:model="name.first" required />
                </div>
                <div class="col-6">
                    <x-ui.form.input label="Last Name" wire:model="name.last" required />
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <x-ui.form.input label="Middle Name" wire:model="name.middle" />
                </div>
                <div class="col-6">
                    <x-ui.form.input label="Suffix Name" wire:model="name.suffix" />
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <x-ui.form.input label="Birthdate" wire:model="birthdate" type="date" required />
                </div>
            </div>

            <button class="btn btn-primary">Save</button>
        </form>
    </x-ui.card>
</div>
