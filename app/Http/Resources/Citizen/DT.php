<?php

namespace App\Http\Resources\Citizen;

use Illuminate\Http\Resources\Json\JsonResource;

class DT extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $actions = "";
        $actions .= "<a class='btn btn-primary btn-sm' href='".route('citizen.show', $this->id)."' target=\"_blank\">View</a>";
        // $actions .= " | <a href='".route('citizen.edit', $this->id)."' target=\"_blank\">Edit</a>";

        return [
            '#' => $this->id,
            'name' => name($this->name),
            'birthdate' => $this->dob->format('F d, Y'),
            'age' => $this->age,
            'sex' => $this->sex,
            'purok' => strtoupper($this->household->purok->name),
            'action' => "{$actions}"
        ];
    }
}
