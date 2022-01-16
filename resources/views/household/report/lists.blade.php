<h2 class="text-center">Household Information Record</h2>


@foreach ($puroks as $purok)
    @if ($purok->citizens->count() != 0)

        <table class="table table-bordered table-sm">
            <thead>
                <tr>
                    <th colspan="9" class="font-weight-bold text-center">{{ $purok->name }}</th>
                </tr>
                <tr>
                    <th>HH</th>
                    <th>LAST NAME</th>
                    <th>FIRST NAME</th>
                    <th>MIDDLE NAME</th>
                    <th>AGE</th>
                    <th>SEX</th>
                    <th>BIRTH DATE</th>
                    <th>PHILHEALTH #</th>
                    <th>4PS/ IPS</th>
                </tr>
            </thead>
            <tbody>
                @foreach($purok->households as $household)

                    <?php
                    $citizens = $household->members->sortBy('name.last');
                    ?>

                    @foreach ($citizens as $citizen)
                    <tr>
                        <td>{{ $household->number }}</td>
                        <td>{{ $citizen->name['last'] }}</td>
                        <td>{{ $citizen->name['first'] }}</td>
                        <td>{{ $citizen->name['middle'] }}</td>
                        <td class="text-center">{{ $citizen->age }}</td>
                        <td>{{ $citizen->sex }}</td>
                        <td>{{ $citizen->birthdate->format('M j, Y') }}</td>
                        <td>{{ $citizen->philhealth }}</td>
                        <td class="text-center">
                            @if($citizen['4ps'])
                                4ps
                            @endif
                            @if($citizen['ips'])
                                IPs
                            @endif
                        </td>


                    </tr>
                    @endforeach
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="8" class="font-weight-bold text-uppercase text-end">Total Households</th>
                    <th colspan="2" class="font-weight-bold text-uppercase text-center">{{ number_format($purok->households->count()) }}</th>
                </tr>
            </tfoot>
        </table>

    @endif
@endforeach
