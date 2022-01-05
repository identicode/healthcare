<div class="modal modal-blur fade" id="modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    @isset($isUpdating)
                        Update Purok
                    @else
                        New Purok
                    @endisset
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                @php
                    $route = (isset($isUpdating)) ? route('purok.update', $purok->id) : route('purok.store');
                @endphp

                <form id="ajax_form" action="{{ $route }}" method="POST">
                    @csrf

                    @isset($isUpdating)
                        @method('PATCH')
                    @endisset


                    <div class="row">
                        <div class="col">
                            <x-ui.form.input label="Name" name="name" :value="$purok->name ?? ''" required />
                        </div>
                    </div>


                    <button class="btn btn-primary mt-2">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<x-include.form.ajax />
