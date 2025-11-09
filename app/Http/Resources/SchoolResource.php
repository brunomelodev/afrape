<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SchoolResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        //dd('aqui');
        return [
            'id' => $this->id,
            'name' => $this->name,
            'cnpj' => $this->cnpj,

            //whenLoaded('<nome da função do model relacionado>')
            'address' => new AddressResource($this->whenLoaded('address')), //whenLoaded evita gargalho no banco de dados pois só carrega quando tiver o with no repository chamando a permissions
        ];
    }
}
