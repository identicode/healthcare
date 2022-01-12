<div class="modal modal-blur fade" id="modal-delete" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-status bg-danger"></div>
            <div class="modal-body text-center py-4">


                <x-ui.icon icon="alert-triangle" class="mb-2 text-danger icon-lg" />
                <h3>Are you sure?</h3>



                <div class="text-muted">
                    All informations related to this household (citizens) will also be deleted. Do you really want
                    to remove? What you've done cannot be undone.
                </div>
            </div>
            <div class="modal-footer">
                <div class="w-100">
                    <div class="row">
                        <div class="col">
                            <a href="#" class="btn btn-white w-100" data-bs-dismiss="modal">Cancel</a>
                        </div>
                        <div class="col">
                            <form action="{{ route('household.destroy', $id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                            <button type="submit" class="btn btn-danger w-100">
                                Delete
                            </button>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
