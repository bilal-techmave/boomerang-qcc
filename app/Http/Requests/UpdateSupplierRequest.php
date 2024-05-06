<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSupplierRequest extends FormRequest
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
            'name'=>'required',
            'abn'=>'required',
            'phone_number'=>'required',
            'address_number'=>'required',
            'street_address'=>'required',
            'zipcode'=>'required',
            'suburb'=>'required',
            'city'=>'required',
            'state'=>'required',
            'email'=>'required|email',
            'notes'=>'required',
        ];
    }
}
