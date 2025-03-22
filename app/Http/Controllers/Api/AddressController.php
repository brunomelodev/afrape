<?php

namespace App\Http\Controllers\Api;

use App\DTO\Address\CreateAddressDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\StoreAddressRequest;
use App\Http\Resources\AddressResource;
use App\Repositories\AddressRepository;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function __construct(private AddressRepository $addressRepository)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoreAddressRequest $request)
    {
       // $data = new CreateAddressDTO(... $request->validated());


        //dd($data);exit;

       $address = $this->addressRepository->createNew(new CreateAddressDTO(... $request->validated()));
        return new AddressResource($address);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
}
