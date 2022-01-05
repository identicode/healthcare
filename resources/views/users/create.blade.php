<x-ui.card title="New User">
    <form id="ajax_form" action="{{ route('users.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-6">
                <x-ui.form.input label="First Name" name="first_name" required />
            </div>
            <div class="col-6">
                <x-ui.form.input label="Last Name" name="last_name" required />
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <x-ui.form.input label="Middle Name" name="middle_name" />
            </div>
            <div class="col-6">
                <x-ui.form.input label="Suffix" name="suffix" />
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <x-ui.form.input label="Birthdate" name="birthdate" type="date" required />
            </div>
            <div class="col-6">
                <x-ui.form.choices label="Role" name="role" required>
                    @foreach($roles as $role)
                        <option>{{ $role->name }}</option>
                    @endforeach
                </x-ui.form.choices>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <x-ui.form.input label="Username" name="username" required />
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <x-ui.form.input label="Password" name="password" type="password" required/>
            </div>
            <div class="col-6">
                <x-ui.form.input label="Password" name="password_confirmation" type="password" required />
            </div>
        </div>

        <button class="btn btn-primary mt-2">Save</button>

    </form>
</x-ui.card>

<x-include.form.ajax />
