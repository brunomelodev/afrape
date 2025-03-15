<?php

namespace App\Http\Controllers\Api;

use App\DTO\Permissions\CreatePermissionDTO;
use App\DTO\Permissions\EditPermissionDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\StorePermissionRequest;
use App\Http\Requests\Api\UpdatePermissionRequest;
use App\Repositories\PermissionRepository;
use Illuminate\Http\Request;
use App\Http\Resources\PermissionResource;
use Illuminate\Http\Response;

class PermissionController extends Controller
{
    public function __construct(private PermissionRepository $permissionRepository)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $permissions = $this->permissionRepository->getPaginate(
            totalPerPage: $request->total_per_page ?? 15,
            page: $request->page ?? 1,
            filter: $request->get('filter', ''),
        );
        return PermissionResource::collection($permissions);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePermissionRequest $request)
    {
        /*
            Poderia explicar sobre os spread operator
            Tudo bem?
            Claro, explico sim, é o spread operator.

            Podemos fazer assim:

            $request->only('value1', 'value2');

            $data = ['value1', 'value2'];
            $request->only(...$data);

            O método only você pode um passar vários parametros, ou um array.
            Ficou claro? Qualquer coisa envio outros exemplos.
        */
        $permission = $this->permissionRepository->createNew(new CreatePermissionDTO(... $request->validated()));
        return new PermissionResource($permission);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if(!$permission = $this->permissionRepository->findById($id)){
            return response()->json(['message' => 'permission not found'], Response::HTTP_NOT_FOUND);
        }

        return new PermissionResource($permission);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePermissionRequest $request, string $id)
    {
        $response = $this->permissionRepository->update(new EditPermissionDTO(...[$id, ...$request->validated()]));
        if(!$response)
        {
            return response()->json(['message' => 'permission not found'], Response::HTTP_NOT_FOUND);
        }

      return response()->json(['message' => 'permission updated with success']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if(!$this->permissionRepository->delete($id))
        {
            return response()->json(['message' => 'permission not found'], Response::HTTP_NOT_FOUND);
        }

        return response()->json([], Response::HTTP_NO_CONTENT);

    }
}


/*

***********************

CORRIGIR E PADRONIZAR TODOS OS CÓDIGOS/VERBOS DE ERROS HTTP

***********************

*/
