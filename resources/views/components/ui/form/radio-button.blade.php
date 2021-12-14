<div class="mb-3">
    <label class="form-label">{{ $label ?? '' }}</label>
    <div class="form-selectgroup">

        @foreach($choices ?? [] as $choice)

        <label class="form-selectgroup-item">
            <input type="radio" name="icons" value="{{ $choice['value'] ?? '' }}" class="form-selectgroup-input">
            <span class="form-selectgroup-label">
                <!-- Download SVG icon from http://tabler-icons.io/i/home -->
                <x-ui.icon icon="{{ $choice['icon'] }}" />
                {{ $choice['label'] }}
            </span>
        </label>

        @endforeach



    </div>
</div>
