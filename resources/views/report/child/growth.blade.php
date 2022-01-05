<h2 class="text-center">CHILD GROWTH REPORT</h2>

<table class="table table-bordered table-sm">
    <thead>
        <tr>
            <th>PUROK</th>
            <th>MOTHER</th>
            <th>NAME OF CHILDREN</th>
            <th>SEX</th>
            <th>Birthdate (D/M/Y)</th>
            <th>AGE IN MONTHS</th>
            <th>WEIGHT</th>
            <th>HEIGHT</th>
            <th>WEIGHT FOR AGE</th>
            <th>HEIGHT FOR AGE</th>
            <th>WEIGHT FOR HEIGHT</th>
            <th>DATE OF MEASUREMENT</th>
        </tr>
    </thead>
    <tbody>

        @foreach($data['data'] as $citizen)
            <?php $medic = $citizen->appointments->last()->medic; ?>
            <tr>
                <td>{{ $citizen->household->purok->name }}</td>
                <td>{{ $citizen->props['mother'] ?? '' }}</td>
                <td>{{ name($citizen->name) }}</td>
                <td>{{ $citizen->sex }}</td>
                <td>{{ $citizen->birthdate->format('d/m/Y') }}</td>
                <td>{{ age_in_month($citizen->dob) }}</td>

                <td>{{ $medic->weight }}</td>
                <td>{{ $medic->height }}</td>
                <td>{{ $medic->wfa }}</td>
                <td>{{ $medic->hfa }}</td>
                <td>{{ $medic->wfh }}</td>
                <td>{{ $medic->created_at->format('d/m/Y') }}</td>

            </tr>
        @endforeach
    </tbody>
</table>
