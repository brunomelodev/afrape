<?php

namespace App\DTO\Address;

class CreateAddressDTO
{
    #BRUNO - Crio o DTO para que caso seja necessário adicionar
    # mais campos, adicione apenas no DTO sem necessidade de adicionar
    # em várias classes
    public function __construct(
        readonly public string $street,
        readonly public string $number,
        readonly public ?string $complement = null,
        readonly public string $neighborhood,
        readonly public string $city,
        readonly public string $state,
        readonly public string $postal_code
    )
    {
        //
    }
}
