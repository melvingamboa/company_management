<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // return false;
        return true;

    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'email' => 'required|unique:companies',
            'address' => 'required',
            'website' => 'required',
            'contact_no' => "nullable",
            'employee_no' => "nullable",
            'logo' => 'required|mimes:jpeg,png,bmp,tiff |max:4096',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Company name is required!',
            'email.required' => 'Email is required!',
            'address.required' => 'Address is required!',
            'website.required' => 'Website is required!',
            'contact_no.required' => 'Contact Number is required!'
        ];
    }
}
