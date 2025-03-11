<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            //BRUNO - poderia personalizar os campos ex: 'desc' => $this->description,
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
        ];
    }
}
