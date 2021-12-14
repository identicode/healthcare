<div class="mb-3">
    <label class="form-label">{{ $label }}</label>
    <select id="choices_{{ $rand }}" type="text" class="form-select {{ $class }}" {{ $attributes }}>
        <option value="">{{ $placeholder ?? 'Select from the list' }}</option>
        {{ $slot }}
    </select>
</div>

@once
    @push('styles')
        {{-- <link href="{{ asset('libs/tom-select/css/tom-select.bootstrap5.min.css') }}" rel="stylesheet" /> --}}
    @endpush
    @push('js-lib')
        <script src="{{ asset('libs/tom-select/dist/js/tom-select.base.min.js') }}"></script>
    @endpush
@endonce


@push('js-custom')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var el;
            window.TomSelect && (new TomSelect(el = document.getElementById('choices_{{ $rand }}'), {
                sortField: {
                    field: "text",
                    direction: "asc"
                },
                placeholder: "{{ $placeholder ?? 'Select from the list' }}",
                copyClassesToDropdown: false,
                dropdownClass: 'dropdown-menu',
                optionClass: 'dropdown-item',

            }));
        });
    </script>
@endpush
