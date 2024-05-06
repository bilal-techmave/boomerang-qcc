<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateDepartmentRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $department = $this->route('department');
        return [
            'name' => 'required|min:2',
            'email' => [
                'required',
                'email',
                Rule::unique('departments', 'email')->ignore($department->id),
            ],
            'internal_code' => [
                'required',
                Rule::unique('departments', 'internal_code')->ignore($department->id),
            ],
            'supervisor' => 'nullable',
            'manager' => 'nullable',
            'is_work_order' => 'nullable',
            'is_email_send' => 'nullable'
        ];
    }
}
