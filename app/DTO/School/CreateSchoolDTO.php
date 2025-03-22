<?php

namespace App\DTO\School;

class CreateSchoolDTO
{
    #BRUNO - Crio o DTO para que caso seja necessário adicionar
    # mais campos, adicione apenas no DTO sem necessidade de adicionar
    # em várias classes
    public function __construct(
        readonly public string $name,
        readonly public string $cnpj,
        readonly public string $address_id
    )
    {
        //
    }
}
