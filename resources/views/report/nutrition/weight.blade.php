<h2 class="text-center">NUTRITION WEIGHT STATUS REPORT</h2>

@foreach ($data['data'] as $purok)
    <table class="table table-bordered table-sm">
        <thead>
            <tr>
                <th colspan="6" class="text-center">{{ $purok->name }}</th>
            </tr>
            <tr>
                <th>HH</th>
                <th>NAME</th>
                <th>BIRTHDATE</th>
                <th>AGE</th>
                <th>SEX</th>
                <th>STATUS</th>
            </tr>
        </thead>
        <tbody>
            @foreach($purok->citizens->sortBy('name.last') as $citizen)
                <tr>
                    <td>{{ $citizen->household->number }}</td>
                    <td>{{ name($citizen->name, 'LFMI') }}</td>
                    <td>{{ $citizen->birthdate->format('d/m/Y') }}</td>
                    <td>{{ $citizen->birthdate->age }}</td>
                    <td>{{ $citizen->sex }}</td>
                    <td>{{ $citizen->props['nutritionStatus'] ?? '' }}</td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="5" class="text-end font-weight-bold">TOTAL NORMAL</td>
                <td>{{ $purok->citizens->where('props.nutritionStatus', 'normal')->count() }}</td>
            </tr>
            <tr>
                <td colspan="5" class="text-end font-weight-bold">TOTAL OVERWEIGHT</td>
                <td>{{ $purok->citizens->where('props.nutritionStatus', 'overweight')->count() }}</td>
            </tr>
            <tr>
                <td colspan="5" class="text-end font-weight-bold">TOTAL UNDERWEIGHT</td>
                <td>{{ $purok->citizens->where('props.nutritionStatus', 'underweight')->count() }}</td>
            </tr>
        </tfoot>
    </table>
<div style="page-break-after: always;"></div>

@endforeach
