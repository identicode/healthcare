<div class="row page-center">
    <div class="col-lg-8">
        <x-ui.card title="New Citizen Form">

            @include('layouts.partials.alerts')



            <form method="POST" wire:submit.prevent='save'>

                <div class="row">
                    <div class="col-md-3"><x-ui.form.input wire:model.lazy="citizen.name.last" label="Last Name" name="last_name" required/></div>
                    <div class="col-md-3"><x-ui.form.input wire:model.lazy="citizen.name.first" label="First Name" name="first_name" required /></div>
                    <div class="col-md-3"><x-ui.form.input wire:model.lazy="citizen.name.middle" label="Middle Name" name="middle_name" /></div>
                    <div class="col-md-3"><x-ui.form.input wire:model.lazy="citizen.name.suffix" label="Suffix" name="suffix" /></div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <x-ui.form.input label="Birthdate" wire:model.lazy='citizen.birthdate' type="date" name="birthdate" required />
                    </div>
                    <div class="col-md-4">
                       <x-ui.form.select label="Sex" name="sex" wire:model.lazy="citizen.sex" required>
                           <option value="">Select from list</option>
                            <option>MALE</option>
                            <option>FEMALE</option>
                       </x-ui.form.select>
                    </div>

                    <div class="col-md-4">
                        <x-ui.form.input label="Philhealth Number" wire:model.lazy="citizen.philhealth" name="philhealth_number" />
                    </div>
                </div>

                <div class="row">

                    <div class="col">
                        <x-ui.form.choices wire:model.lazy="citizen.household_id" label="Household - Purok" name="household" required>
                            @foreach($households as $household)
                                <option value="{{ $household->id }}">{{ $household->number }} ({{ strtoupper($household->purok->name) }})</option>
                            @endforeach
                        </x-ui.form.choices>
                    </div>

                    @if(Carbon\Carbon::parse($citizen['birthdate'])->age < 18)
                        <div class="col">
                            <x-ui.form.input label="Mother's Name" wire:model.lazy="citizen.props.mother" name="philhealth_number" />
                        </div>
                    @endif

                </div>

                <label class="form-check form-check-inline">
                    <input class="form-check-input" name="member" type="checkbox" wire:model.lazy="citizen.4ps">
                    <span class="form-check-label">4Ps / IP Member</span>
                </label>

                <br>


                <button class="btn btn-primary mt-2">Submit</button>


            </form>


        </x-ui.card>
    </div>
</div>
