<?php

namespace App\Http\Controllers;

use App\Http\Requests\users\StoreUserRequest;
use App\Http\Requests\users\UpdateUserRequest;
use App\Models\User;
use Illuminate\Auth\Events\Validated;
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

    public function edit(string $id)
    {
        $options = [
            '0' => 'Usuário',
            '1' => 'Administrador'
        ];
        if (!$user = User::find($id)) {
            return redirect()
                ->route('users.index')
                ->with('error', 'Usuário não encontrado!');
        }

        return view('users.edit', compact('user', 'options'));
    }

    public function update(UpdateUserRequest $request, string $id)
    {
        if (!$user = User::find($id)) {
            return redirect()
                ->route('users.index')
                ->with('error', 'Usuário não encontrado!');
        }

        $data = $request->validated();

        if ($data['password'] == null) {
            unset($data['password']);
        }

        $user->update($data);

        return redirect()
            ->route('users.index')
            ->with('success', 'Usuário atualizado com sucesso!');
    }
}
