<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AddressResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'street' => $this->street,
            'number' => $this->number,
            'complement'   => $this->complement,
            'neighborhood' => $this->neighborhood,
            'city'         => $this->city,
            'state'        => $this->state,
            'postal_code'  => $this->postal_code,
            //  'created_at'   => $this->created_at ? $this->created_at->format('d/m/Y H:i:s') : null,
            //  'updated_at'   => $this->updated_at ? $this->updated_at->format('d/m/Y H:i:s') : null,

        ];
    }
}
