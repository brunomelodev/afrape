<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(15);

        return view('users.index', compact('users'));
    }

    public function create()
    {
        $options = [
            '0' => 'Usuário',
            '1' => 'Administrador'
        ];
        return view('users.create', compact('options'));
    }

    public function store(StoreUserRequest $request)
    {
        $newuser = $request->validated();
        $newuser['email_verified_at'] = now();
      
        User::create($newuser);

        return redirect()
            ->route('users.index')
            ->with('success', 'Usuário criado com sucesso!');
    }
}
