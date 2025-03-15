<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Auth\AuthApiRequest;
use App\Http\Resources\UserResource;
use App\Repositories\UserRepository;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthApiController extends Controller
{

    public function __construct(private UserRepository $userRepository)
    {

    }

    public function auth(AuthApiRequest $request) {

        $user = $this->userRepository->findByEmail($request->email);

        if (! $user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        /*
        deleta os tokens anteriores antes de criar
            garantindo que não haverá acessos simultaneos.
        */
        $user->tokens()->delete();

        $token = $user->createToken($request->device_name)->plainTextToken;

        return response()->json([
            'token' => $token
        ]);
    }

    public function logout()
    {
        //delta o token específico
        //Auth::user()->tokens('token específico')->delete();

        //deleta todos os tokens do usuário (apenas)
        Auth::user()->tokens()->delete();

        return response()->json([], Response::HTTP_NO_CONTENT);
    }

    public function me()
    {
        $user = Auth::user();

        return new UserResource($user);

    }
}
