<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClientRequest extends FormRequest
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
            'business_name'=>'required',
            'trading_name'=>'required',
            'abn'=>'nullable',
            'acn'=>'nullable',
            'phone_number'=>'required',
            'second_number'=>'nullable',
            'mobile_number'=>'nullable',
            'fax_number'=>'nullable',
            'client_type'=>'required',
            'website'=>'required',
            'facebook'=>'required',
            'twitter'=>'required',
            'instagram'=>'required',
            'linkedin'=>'required',
            'comapny_id'=>'required',
            'is_prospect_client'=>'nullable',
            'is_direct_client'=>'nullable',
            'notes'=>'nullable'
        ];
    }
}
