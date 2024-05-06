<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateClientRequest extends FormRequest
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
            'business_name','trading_name','abn','acn','phone_number','second_number','mobile_number','fax_number','client_type','website','facebook','twitter','instagram','linkedin','comapny_id','is_prospect_client','is_direct_client','status','notes'
        ];
    }
}
