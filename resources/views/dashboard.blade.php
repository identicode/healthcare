<div class="row row-cards">
    <div class="col">
        <x-ui.widget icon="map-pin" title="Puroks" :desc="$counts['puroks']" />
    </div>
    <div class="col">
        <x-ui.widget icon="users" title="Citizens" :desc="$counts['citizens']" />
    </div>
    <div class="col">
        <x-ui.widget icon="home" title="Households" :desc="$counts['households']" />
    </div>
    <div class="col">
        <x-ui.widget icon="report-medical" title="Appointment Today" :desc="$counts['appointments']" />
    </div>

</div>
