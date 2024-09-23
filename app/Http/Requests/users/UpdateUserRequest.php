<?php

namespace App\Http\Requests\users;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:3', 'max:255'],
            'email' => [
                'required',
                'email',
                'min:5',
                'max:255',
                Rule::unique('users', 'email')->ignore($this->user, 'id'),
            ],
            'level' => ['required'],
            'password' => [
                'nullable',
                'min:8',
                'max:20',
                'confirmed',
            ],

        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'O nome é obrigatório',
            'name.string' => 'O nome deve ser uma string',
            'name.min' => 'O nome deve ter no minimo 3 caracteres',
            'name.max' => 'O nome deve ter no maximo 255 caracteres',

            'email.required' => 'O email é obrigatório',
            'email.email' => 'O email deve ser um email',
            'email.min' => 'O email deve ter no minimo 5 caracteres',
            'email.max' => 'O email deve ter no maximo 255 caracteres',
            'email.unique' => 'O email ja existe',

            'password.required' => 'A senha é obrigatoria',
            'password.min' => 'A senha deve ter no minimo 8 caracteres',
            'password.max' => 'A senha deve ter no maximo 20 caracteres',
            'password.confirmed' => 'As senhas devem ser iguais',


        ];
    }
}
