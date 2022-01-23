<h2 class="text-center">CHILD NEED TO BE VACCINATE REPORT</h2>

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
            </tr>
        </thead>
        <tbody>
            @foreach ($purok->citizens->where('props.needVaccine', true)->filter(function($val) {

                $range = explode(',', request('age', '0,5'));
                $a = $range[0] ?? 0;
                $b = $range[1] ?? 5;
                return ($val->dob->age >= $a AND $val->dob->age <= $b);

            })->sortBy('name.last') as $citizen)
                <tr>
                    <td>{{ $citizen->household->number }}</td>
                    <td>{{ name($citizen->name, 'LFMI') }}</td>
                    <td>{{ $citizen->birthdate->format('d/m/Y') }}</td>
                    <td>{{ $citizen->birthdate->age }}</td>
                    <td>{{ $citizen->sex }}</td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th class="text-end font-weight-bold" colspan="4">TOTAL</th>
                <th class="text-center">{{ $purok->citizens->where('props.needVaccine', true)->count() }}</th>
            </tr>
        </tfoot>
    </table>
    <div style="page-break-after: always;"></div>

@endforeach
