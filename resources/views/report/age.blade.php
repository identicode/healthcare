<h2 class="text-center">Age Distribution Report</h2>


<div class="row">
    <div class="col-6">
        <table class="table table-bordered table-sm">
            <thead>
                <tr>
                    <th>AGE</th>
                    <th>MALE</th>
                    <th>FEMALE</th>
                    <th>TOTAL</th>

                </tr>
            </thead>
            <tbody>
                @for ($a = 0; $a <= 29; $a++)
                    <?php
                    $f = $data['data']
                        ->where('age', $a)
                        ->where('sex', 'MALE')
                        ->count();
                    $m = $data['data']
                        ->where('age', $a)
                        ->where('sex', 'FEMALE')
                        ->count();
                    $t = $f + $m;
                    ?>
                    <tr>
                        <td>{{ $a }}</td>
                        <td>{{ $m }}</td>
                        <td>{{ $f }}</td>
                        <td>{{ $t }}</td>
                    </tr>
                @endfor
            </tbody>
        </table>
    </div>
    <div class="col-6">

        <table class="table table-bordered table-sm">

            <thead>
                <tr>
                    <th>AGE</th>
                    <th>MALE</th>
                    <th>FEMALE</th>
                    <th>TOTAL</th>

                </tr>
            </thead>
            <tbody>
                @for ($a = 30; $a <= 59; $a++)
                    <?php
                    $f = $data['data']
                        ->where('age', $a)
                        ->where('sex', 'MALE')
                        ->count();
                    $m = $data['data']
                        ->where('age', $a)
                        ->where('sex', 'FEMALE')
                        ->count();
                    $t = $f + $m;
                    ?>
                    <tr>
                        <td>{{ $a }}</td>
                        <td>{{ $m }}</td>
                        <td>{{ $f }}</td>
                        <td>{{ $t }}</td>
                    </tr>
                @endfor
            </tbody>
        </table>

    </div>
</div>

<div style="page-break-after: always;"></div>

<h2 class="text-center d-none d-print-block">Age Distribution Report</h2>

<div class="row">
    <div class="col-6">
        <table class="table table-bordered table-sm">
            <thead>
                <tr>
                    <th>AGE</th>
                    <th>MALE</th>
                    <th>FEMALE</th>
                    <th>TOTAL</th>

                </tr>
            </thead>
            <tbody>
                @for ($a = 60; $a <= 89; $a++)
                    <?php
                    $f = $data['data']
                        ->where('age', $a)
                        ->where('sex', 'MALE')
                        ->count();
                    $m = $data['data']
                        ->where('age', $a)
                        ->where('sex', 'FEMALE')
                        ->count();
                    $t = $f + $m;
                    ?>
                    <tr>
                        <td>{{ $a }}</td>
                        <td>{{ $m }}</td>
                        <td>{{ $f }}</td>
                        <td>{{ $t }}</td>
                    </tr>
                @endfor
            </tbody>
        </table>
    </div>
    <div class="col-6">

        <table class="table table-bordered table-sm">

            <thead>
                <tr>
                    <th>AGE</th>
                    <th>MALE</th>
                    <th>FEMALE</th>
                    <th>TOTAL</th>

                </tr>
            </thead>
            <tbody>
                @for ($a = 90; $a <= 119; $a++)
                    <?php
                    $f = $data['data']
                        ->where('age', $a)
                        ->where('sex', 'MALE')
                        ->count();
                    $m = $data['data']
                        ->where('age', $a)
                        ->where('sex', 'FEMALE')
                        ->count();
                    $t = $f + $m;
                    ?>
                    <tr>
                        <td>{{ $a }}</td>
                        <td>{{ $m }}</td>
                        <td>{{ $f }}</td>
                        <td>{{ $t }}</td>
                    </tr>
                @endfor
            </tbody>
        </table>

    </div>
</div>
