<div class="mb-3">
    <label class="form-label">{{ $label ?? '' }}</label>

    <div class="input-group mb-2">
        <input class="form-control" {{ $attributes }}>

        <span class="input-group-text">
            {{ $suffix ?? '' }}
        </span>
    </div>

</div>
