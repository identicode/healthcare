<?php

namespace App\Observers;

use App\Models\Citizen;
use App\Models\CitizenReport;

class CitizenObserver
{
    public $afterCommit = true;

    /**
     * Handle the Citizen "created" event.
     *
     * @param  \App\Models\Citizen  $citizen
     * @return void
     */
    public function created(Citizen $citizen)
    {
        CitizenReport::create($this->datas($citizen));
    }

    /**
     * Handle the Citizen "updated" event.
     *
     * @param  \App\Models\Citizen  $citizen
     * @return void
     */
    public function updated(Citizen $citizen)
    {
        //
    }

    /**
     * Handle the Citizen "deleted" event.
     *
     * @param  \App\Models\Citizen  $citizen
     * @return void
     */
    public function deleted(Citizen $citizen)
    {
        //
    }

    /**
     * Handle the Citizen "restored" event.
     *
     * @param  \App\Models\Citizen  $citizen
     * @return void
     */
    public function restored(Citizen $citizen)
    {
        //
    }

    /**
     * Handle the Citizen "force deleted" event.
     *
     * @param  \App\Models\Citizen  $citizen
     * @return void
     */
    public function forceDeleted(Citizen $citizen)
    {
        //
    }

    private function datas($citizen)
    {
        return [
            'first_name' => $citizen->name['first'],
            'last_name' => $citizen->name['last'],
            'middle_name' => $citizen->name['middle'],
            'suffix_name' => $citizen->name['suffix'],
            'dob' => $citizen->birthdate,
            'sex' => $citizen->sex,
            'need_vaccine' => $citizen->props['needVaccine'] ?? false,
            'need_vitamins' => $citizen->props['needVitamins'] ?? false,
            'is_dead' => $citizen->props['isDead'] ?? false,
        ];
    }
}
