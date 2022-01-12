<div class="modal modal-blur fade" id="modal-create-household" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">New household</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="ajax_form" action="{{ route('household.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <x-ui.form.input label="Number" name="number" required />
                        </div>
                        <div class="col">
                            <x-ui.form.choices label="Purok" name="purok" required>
                                @isset($puroks)
                                    @foreach ($puroks as $purok)
                                        <option value="{{ $purok->id }}">{{ $purok->name }}</option>
                                    @endforeach
                                @endisset

                                @isset($__purok)
                                    <option selected value="{{ $__purok->id }}">{{ $__purok->name }}</option>
                                @endisset

                            </x-ui.form.choices>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <x-ui.form.input label="Coordinates" name="coordinates" required>
                                <small class="form-hint">Get the coordinates in <a href="https://maps.google.com"
                                        target="_new">Google Maps</a>.</small>
                            </x-ui.form.input>

                        </div>
                    </div>

                    <button class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<x-include.form.ajax />
