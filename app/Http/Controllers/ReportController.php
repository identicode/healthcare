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
                return redirect(route('household.index', ['print' => true]));
            }

            $data = match($request->get('target')) {
                'age' => $this->age($start, $end),
                'child_growth' => $this->child_growth($start, $end),
                'child_vaccine' => $this->child_needs($start, $end, 'vac'),
                'child_vitamins' => $this->child_needs($start, $end, 'vits'),
                'nutrition_weight' => $this->nutrition_weight($start, $end)
            };

            return view('report.generator', [
                'data'  => $data,
                'start' => $start,
                'end'   => $end,
            ]);
        }

        return view('report.index');
    }

    public function nutrition_weight($start, $end)
    {
        $puroks = Purok::with(['citizens.household'])->get();

        return [
            'type' => 'Nutrition Weight Status Report',
            'data' => $puroks
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
            return $val->dob->age <= 5;
        })->filter(function ($val, $key) {
            return $val->appointments->last() !== null;
        })->sortBy('household.purok.id');

        return [
            'type' => "Child Growth Report",
            'data' => $filt,
        ];
    }

    public function age($start, $end)
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
        ];
    }

}
