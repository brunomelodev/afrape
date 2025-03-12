<?php

namespace App\DTO\Users;

class CreateUserDTO
{
    #BRUNO - Crio o DTO para que caso seja necessário adicionar
    # mais campos, adicione apenas no DTO sem necessidade de adicionar
    # em várias classes
    public function __construct(
        readonly public string $name,
        readonly public string $email,
        readonly public string $password,
    )
    {
        //
    }
}
