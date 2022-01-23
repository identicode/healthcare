<?php

namespace App\Http\Controllers;

use App\Models\Citizen;
use App\Models\Purok;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function __invoke(Request $request)
    {

        if ($request->has('generate') and $request->get('generate') == true) {

            $start = Carbon::parse($request->get('start'));
            $end   = Carbon::parse($request->get('end'));

            if($request->get('target') === 'household'){
                return redirect(route('household.index', ['print' => true, 'purok' => $request->get('purok')]));
            }

            $data = match($request->get('target')) {
                'age' => $this->age($start, $end),
                'child_growth' => $this->child_growth($start, $end),
                'child_vaccine' => $this->child_needs($start, $end, 'vac'),
                'child_vitamins' => $this->child_needs($start, $end, 'vits'),
                'nutrition_weight' => $this->nutrition_weight($request)
            };

            return view('report.generator', [
                'data'  => $data,
                'start' => $start,
                'end'   => $end,
            ]);
        }

        $puroks = Purok::get();

        return view('report.index', compact('puroks'));
    }

    public function nutrition_weight($request)
    {
        $puroks = Purok::with('citizens.household');

        if($request->get('purok') != 'all'){
            $puroks->where('id', (int)$request->get('purok'));
        }

        return [
            'type' => 'Nutrition Weight Status Report',
            'data' => $puroks->get()
        ];
    }

    public function child_needs($start, $end, $needs)
    {
        $puroks = Purok::with('citizens.household')->get();

        return [
            'type' => ($needs == 'vac') ? 'Child Vaccine Report' : 'Child Vitamins Report',
            'data' => $puroks
        ];
    }

    public function child_growth($start, $end)
    {
        $age[1] = Carbon::now();
        $age[0] = $age[1]->subYear(5);

        $childs = Citizen::with(['appointments' => function ($q) use ($start, $end) {
            return $q->whereBetween('updated_at', [$start, $end]);
        }, 'household.purok'])->get();

        $filt = $childs->filter(function ($val, $key) {

            $range = explode(',', request('age', '0,5'));
            $a = $range[0] ?? 0;
            $b = $range[1] ?? 5;

            return ($val->dob->age >= $a AND $val->dob->age <= $b);

        })->filter(function ($val, $key) {
            return $val->appointments->last() !== null;
        })->sortBy('household.purok.id');

        return [
            'type' => "Child Growth Report",
            'data' => $filt,
        ];
    }

    public function age()
    {
        $citizens = Citizen::get();
        $citizens = $citizens->map(function ($item, $key) {
            return [
                'name' => name($item->name),
                'age'  => $item->dob->age,
                'sex'  => $item->sex,
            ];
        });

        return [
            'type' => 'Age Report',
            'data' => $citizens,
            'purok' => Purok::find(request()->get('purok'))
        ];
    }

}
