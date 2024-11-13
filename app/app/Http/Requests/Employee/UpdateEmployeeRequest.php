<?php

namespace App\Http\Requests\Employee;

use App\Rules\ValidCpf;
use App\Rules\ValidEmployeeVaccination;
use Illuminate\Foundation\Http\FormRequest;

class UpdateEmployeeRequest extends FormRequest
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
            'name' => ['required', 'string'],
            'cpf' => ['required', 'string', new ValidCpf, 'unique:employees,cpf'],
            'birth_date' => ['required', 'date'],
            'has_comorbidity' => ['nullable', 'boolean'],
            'vaccines' => ['nullable', new ValidEmployeeVaccination],
        ];
    }
}
