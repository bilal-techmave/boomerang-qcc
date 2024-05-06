<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMainCompnayRequest extends FormRequest
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
        return [
            'business_name' => 'required|unique:main_companies,business_name',
            'abn' => 'required',
            'unit' => 'required',
            'address_number' => 'required',
            'street_address' => 'required',
            'suburb' => 'required',
            'city' => 'required|not_in:0',
            'state'=>'required|not_in:0',
            'zipcode'=>'required'
        ];
    }
}
