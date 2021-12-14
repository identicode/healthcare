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
        return [
            '#' => $this->id,
            'name' => name($this->name),
            'birthdate' => $this->birthdate->format('F d, Y'),
            'purok' => strtoupper($this->household->purok->name),
            'action' => '
                <a href="#" target="_new">View</a>
            '
        ];
    }
}
