<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class StoreSchoolRequest extends FormRequest
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
            'name' => 'required|min:3|max:255',
            'cnpj' => 'required',
            'address.street' => 'required|min:3|max:255',
            'address.number' => 'required|min:1|max:255',
            'address.complement'   => 'nullable|string|max:255',
            'address.neighborhood' => 'required|string|max:255',
            'address.city'         => 'required|string|max:255',
            'address.state'        => 'required|string|size:2', // Estado deve ter exatamente 2 caracteres (SP, RJ, etc.)
            'address.postal_code'  => 'required|string|regex:/^\d{5}-\d{3}$/', // Validação de CEP no formato 00000-000

        ];
    }
}
