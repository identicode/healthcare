<?php

namespace App\Http\Livewire;

use App\Models\Citizen;
use App\Models\Purok;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filter;

class CitizenTable extends DataTableComponent
{

    public $puroks;
    public bool $showSearch = false;

    public array $columnSearch = [
        'name' => null,
        'dob'  => null,
    ];

    public $bulkActions = [
        'vitamin' => 'Need Vitamin',
        'vaccine' => 'Need Vaccine',
    ];

    public function boot()
    {
        $this->queryString['columnSearch'] = ['except' => null];

        $puroks = ['All'];

        foreach (Purok::get() as $purok) {
            $puroks[$purok->id] = $purok->name;
        }

        $this->puroks = $puroks;

    }

    public function columns(): array
    {
        return [

            Column::make('Name')->format(function ($value) {
                return name($value);
            })->searchable()
            ->secondaryHeader(function () {
                return view('livewire-tables::bootstrap-5.includes.input-search', [
                    'field' => 'name', 'columnSearch' => $this->columnSearch,
                ]);
            }),

            Column::make('Age', 'birthdate')->format(function ($value) {
                return $value->age;
            }),

            Column::make('Sex'),
            Column::make('Purok', 'household.purok.name'),
            Column::make('Action', '')->format(function($value, $column, $row){

                return '<a class="btn btn-primary btn-sm btn-flat" href="'.route('citizen.show', $row).'">View Details</a>';

            })->asHtml()

        ];
    }

    public function filters(): array
    {
        return [
            'purok' => Filter::make('Purok')->select($this->puroks),
            'sex'   => Filter::make('Sex')->select(['0' => 'All', 'MALE', 'FEMALE']),
        ];
    }

    public function query(): Builder
    {

        return Citizen::with('household.purok')
            ->when($this->getFilter('purok'), function ($query, $value) {
                return $query->whereHas('household', function ($query) use ($value) {
                    $query->where('purok_id', $value);
                });
            })
            ->when($this->getFilter('sex'), fn($query, $value) => $query->where('sex', $value))
            ->when($this->columnSearch['name'] ?? null, function ($query, $name) {
                $query->where('name->first', 'like', '%' . strtoupper($name) . '%')
                    ->orWhere('name->last', 'like', '%' . strtoupper($name) . '%')
                    ->orWhere('name->middle', 'like', '%' . strtoupper($name) . '%')
                    ->orWhere('name->suffix', 'like', '%' . strtoupper($name) . '%');
            });
    }

    public function vitamin(): void
    {
        $ids      = $this->selectedKeys();
        $citizens = Citizen::whereIn('id', $ids)->get();
        foreach ($citizens as $c) {
            $c->update([
                'props->needVitamins' => true,
            ]);
        }

        $this->resetBulk();
    }

    public function vaccine(): void
    {

        $ids      = $this->selectedKeys();
        $citizens = Citizen::whereIn('id', $ids)->get();

        foreach ($citizens as $c) {
            $c->update([
                'props->needVaccine' => true,
            ]);
        }
    }
}
