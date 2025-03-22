<?php

namespace App\Repositories;

use App\DTO\School\CreateSchoolDTO;
use App\Models\School;
use Illuminate\Pagination\LengthAwarePaginator;

use function PHPUnit\Framework\isNull;

class SchoolRepository
{
    public function __construct(protected School $school)
    {
    }

    public function findById($id): ?School
    {
        return $this->school->find($id);
    }

    public function getPaginate(int $totalPerPage = 15, int $page = 1, string $filter = '', bool $address = false): LengthAwarePaginator
    {
        //se solicitar o endereço busca o endereço
        if($address){
            return $this->school->where(function($query) use ($filter){
                if($filter !== ''){
                    $query->where('name', 'LIKE', "%{$filter}%");
                }
            })
            ->with(['address'])  //traz todas as permissions juntas //with(['<nome da função do model School>'])
            ->paginate($totalPerPage, ['*'], 'page', $page);
        }

       return $this->school->where(function($query) use ($filter){
            if($filter !== ''){
                $query->where('name', 'LIKE', "%{$filter}%");
            }
        })
        ->paginate($totalPerPage, ['*'], 'page', $page);

    }

    public function createNew(CreateSchoolDTO $dto): School
    {
        $data = (array) $dto;
        return $this->school->create($data);
    }


}
