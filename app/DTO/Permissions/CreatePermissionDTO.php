<?php

namespace App\DTO\Permissions;

class CreatePermissionDTO
{
    #BRUNO - Crio o DTO para que caso seja necessário adicionar
    # mais campos, adicione apenas no DTO sem necessidade de adicionar
    # em várias classes
    public function __construct(
        readonly public string $name,
        readonly public string $description = '', // ?  setar um valor
    )
    {
        //
    }
}
