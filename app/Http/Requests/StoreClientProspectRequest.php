<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClientProspectRequest extends FormRequest
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
                    "contact_email" => "required|email|unique:client_prospects",
                    "business_name" => "required",
                    "address_number" => "required",
                    "street_address" => "required",
                    "suburb" => "required",
                    "city_id" => "required",
                    "state_id" => "required",
                    "zipcode" => "required",
                    "contact_name" => "required",
                    "contact_surname" => "required",
                    "phone_number" => "required|unique:client_prospects",
                    "contact_type" => "required",
                    "contacted_by" => "required",
                    "client_entry_point" => "required",
                ];
    }
}
