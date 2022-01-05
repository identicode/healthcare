<div class="card card-sm">
    <div class="card-body">
        <div class="row align-items-center">
            <div class="col-auto">
                <span class="bg-red-lt text-white avatar">
                    <x-ui.icon :icon="$icon" />
                </span>
            </div>
            <div class="col">
                <div class="font-weight-medium">
                   {{ $title }}
                </div>
                <div class="text-muted">
                    {{ $desc }}
                </div>
            </div>
        </div>
    </div>
</div>
