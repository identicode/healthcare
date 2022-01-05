
<x-ui.card>
    <div class="ratio ratio-16x9">
        <div>
            <div id="map-markers" class="w-100 h-100 rounded"></div>
        </div>
    </div>

    <div class="text-center">
        <a target="_blank" href="https://google.com/maps/search/{{ $geo->implode(', ') }}" class="btn mt-2" ><x-ui.icon icon="map-2" /> View in Google Maps</a>
    </div>

</x-ui.card>

@once

    @push('styles')
    <link href="https://api.mapbox.com/mapbox-gl-js/v1.8.0/mapbox-gl.css" rel="stylesheet"/>


    @endpush

    @push('js-lib')
        <!-- Libs JS -->
        <script src="https://api.mapbox.com/mapbox-gl-js/v1.8.0/mapbox-gl.js"></script>>
    @endpush

    @push('js-custom')
    <script>
        // @formatter:off
        document.addEventListener("DOMContentLoaded", function() {
            mapboxgl.accessToken = 'pk.eyJ1IjoiY29kZWNhbG0iLCJhIjoiSzRiOVJvQSJ9.BUVkTT6IYs83xSUs4H7bjQ';

            var geolocation = @json($geo)


            var map = new mapboxgl.Map({
                container: 'map-markers',
                style: 'mapbox://styles/mapbox/streets-v11',
                zoom: 12,
                center: [Number(geolocation.lng), Number(geolocation.lat)],
            });
            new mapboxgl.Marker({ color: "#206bc4" }).setLngLat([Number(geolocation.lng), Number(geolocation.lat)]).addTo(map);

        });
        // @formatter:on
      </script>
    @endpush


@endonce
