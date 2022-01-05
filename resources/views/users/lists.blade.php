<x-ui.table.data title="User Lists">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Username</th>
            <th>Role</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($accounts as $account)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ name($account->name) }}</td>
                <td>{{ $account->username }}</td>
                <td>{{ $account->roles->first()->name ?? '' }}</td>
                <td>
                    <a href="{{ route('users.edit', $account->id) }}">Edit</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</x-ui.table.data>
