<div>
    <x-ui.table.data title="Household lists">
        <thead>
            <tr>
                <th>#</th>
                <th>Number</th>
                <th>GEO</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($households as $household)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $household->number }}</td>
                    <td>{{ $household->geolocation }}</td>
                    <td>
                        <a href="https://google.com/maps/search/{{ $household->coordinates }}" target="_new">
                            View in Maps
                          </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </x-ui.table.data>
</div>
