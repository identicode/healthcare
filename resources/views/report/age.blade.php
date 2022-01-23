<h2 class="text-center">Age Distribution Report</h2>
<h4 class="text-center">
    @if(request()->get('purok') != 'all')
        {{ $data['purok']['name'] ?? '' }}
    @else
    ALL PUROK
    @endif
</h4>



<?php
$range = explode(',', request('age', '0,100'));

$cols = collect(range($range[0] ?? 0, $range[1] ?? 100))->chunk(23);
?>


<div class="row">


    <?php
        switch ($cols->count()) {
            case 2:
                $count = 'col-6';
                break;
            case 5:
                $count = 'col-2';
                break;
            default:
                $count = 'col-3';
                break;
        }
    ?>

    @foreach($cols as $col)
        <div class="{{ $count }}">
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
                    @foreach ($col as $age)
                        <?php
                        $f = $data['data']
                            ->where('age', $age)
                            ->where('sex', 'MALE')
                            ->count();
                        $m = $data['data']
                            ->where('age', $age)
                            ->where('sex', 'FEMALE')
                            ->count();
                        $t = $f + $m;
                        ?>
                        <tr>
                            <td>{{ $age }}</td>
                            <td>{{ $m }}</td>
                            <td>{{ $f }}</td>
                            <td>{{ $t }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endforeach
</div>

