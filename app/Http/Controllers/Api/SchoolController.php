<?php

namespace App\Http\Controllers\Api;

use App\DTO\Address\CreateAddressDTO;
use App\DTO\School\CreateSchoolDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\StoreSchoolRequest;
use App\Http\Resources\AddressResource;
use App\Http\Resources\SchoolResource;
use App\Repositories\AddressRepository;
use Illuminate\Http\Request;
use App\Repositories\SchoolRepository;
use Illuminate\Http\Response;

class SchoolController extends Controller
{


    public function __construct(private SchoolRepository $schoolRepository, private AddressRepository $addressRepository) {}

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $users = $this->schoolRepository->getPaginate(
            totalPerPage: $request->total_per_page ?? 15,
            page: $request->page ?? 1,
            filter: $request->filter ?? '',
            address: $request->address ?? false, //se houver valor passado ele exibe o endereço
        );
        return SchoolResource::collection($users);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSchoolRequest $request)
    {

        $data = $request->validated();
        $address = new AddressResource($this->addressRepository->createNew(new CreateAddressDTO(...$data['address'])));

        if ($address->resource === null) {
            return Response()->json([
                'message' => 'Já existe um registro de escola.',
            ], Response::HTTP_CONFLICT); // HTTP 409 - Conflito
        }

        $data = collect($data)->except('address')->toArray();
        //unset($data['address']);

        $data['address_id'] = $address['id'];

        $school = $this->schoolRepository->createNew(new CreateSchoolDTO(...$data));
        return new SchoolResource($school);
    }

    /**
     * Display the specified resource.
     */
    public function show(?string $id = null)
    {
        return new SchoolResource($this->schoolRepository->findFirst());
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


    /*
    *
    */
}
