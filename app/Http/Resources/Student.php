<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Student extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'image' => env('APP_URL') . '/storage/hcs/' .$this->picture,
            'attendance' => $this->entry['attendance'],
            'lunch' => $this->entry['lunch'],
            'beard' => $this->entry['beard'],
            'belt' => $this->entry['belt'],
            'shoes' => $this->entry['shoes'],
            'uniform' => $this->entry['uniform'],
        ];
    }
}
