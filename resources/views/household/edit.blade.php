<div class="modal modal-blur fade" id="modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update household</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="ajax_form" action="{{ route('household.update', $household->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="row">
                        <div class="col">
                            <x-ui.form.input label="Number" name="number" :value="$household->number" required />
                        </div>
                        <div class="col">
                            <x-ui.form.choices label="Purok" name="purok" required>
                                @foreach ($puroks as $purok)
                                    <option {{ sh($purok->id, $household->purok_id) }} value="{{ $purok->id }}">{{ $purok->name }}</option>
                                @endforeach
                            </x-ui.form.choices>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <x-ui.form.input label="Coordinates" name="coordinates" :value="$household->coordinates" required>
                                <small class="form-hint">Get the coordinates in <a href="https://maps.google.com" target="_new">Google Maps</a>.</small>
                            </x-ui.form.input>

                        </div>
                    </div>

                    @if($household->members->count() !== 0)
                        <x-ui.form.choices label="Household Head" name="head" required>
                            @foreach ($household->members as $member)
                               @continue($member->is_dead)
                                <option {{ sh($member->id, $household->head_id) }} value="{{ $member->id }}">{{ name($member->name) }}</option>
                            @endforeach
                        </x-ui.form.choices>
                    @endif



                    <button class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<x-include.form.ajax />
