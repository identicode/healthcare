<div>
    <x-ui.table.data title="Purok lists">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Households</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($zones as $zone)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $zone->name }}</td>
                    <td>{{ $zone->households_count }}</td>
                    <td></td>
                </tr>
            @endforeach
        </tbody>
    </x-ui.table.data>
</div>
