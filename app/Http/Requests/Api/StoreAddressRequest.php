<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class StoreAddressRequest extends FormRequest
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
            'street' => 'required|min:3|max:255',
            'number' => 'required|min:1|max:255',
            'complement'   => 'nullable|string|max:255',
            'neighborhood' => 'required|string|max:255',
            'city'         => 'required|string|max:255',
            'state'        => 'required|string|size:2', // Estado deve ter exatamente 2 caracteres (SP, RJ, etc.)
            'postal_code'  => 'required|string|regex:/^\d{5}-\d{3}$/', // Validação de CEP no formato 00000-000
        ];
    }
}
