<?php

namespace App\Http\Requests\students;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStudentsRequest extends FormRequest
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
            'birthday' => ['nullable', 'date'],
            'cpf' => ['required', 'string', 'max:14'],
            'rg' => ['required', 'string', 'max:14'],
            'nis' => ['nullable', 'string', 'max:14'],
            'ra' => ['nullable', 'string', 'max:14'],
            'responsible_name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:15'],
            'whatsapp' => ['nullable', 'string', 'max:15'],
            'gender' => ['nullable', 'string'],
            'origin_school' => ['nullable', 'string', 'max:255'],
            'series' => ['nullable', 'string', 'max:255'],
            'class' => ['nullable', 'string', 'max:255'],
            'date_of_entry' => ['nullable', 'date'],
        ];
    }

    public function messages(): array
    {
        return [


        ];
    }
}
