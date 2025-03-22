<?php

namespace App\Repositories;

use App\DTO\Address\CreateAddressDTO;
use App\Models\Address;
use App\Models\School;

class AddressRepository
{
    public function __construct(protected Address $address)
    {
    }

    public function findById($id): ?Address
    {
        return $this->address->find($id);
    }

    public function createNew(CreateAddressDTO $dto): ?Address
    {
        //só pode existir uma escola
        if(School::exists()){
            return null;
        }

        $data = (array) $dto;
        return $this->address->create($data);
    }


}
