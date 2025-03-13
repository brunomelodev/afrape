<?php

namespace App\DTO\Users;

class EditUserDTO
{
    #BRUNO - Crio o DTO para que caso seja necessário adicionar
    # mais campos, adicione apenas no DTO sem necessidade de adicionar
    # em várias classes
    public function __construct(
        readonly public string $id,
        readonly public string $name,
        readonly public ?string $password = null, //a interrogação deixa o parametro opcional
    )
    {
        //
    }
}
