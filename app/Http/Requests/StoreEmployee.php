<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployee extends FormRequest
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
            'first_name'    => 'required|max:255',
            'last_name'     => 'required|max:255',
            'age'           => 'required|digits_between:1,3',
            'position'      => 'required|max:255'
        ];
    }

    public function messages()
    {
        return [
            'first_name.required'   => 'First Name is required!',
            'last_name.required'    => 'Last Name is required!',
            'age.required'          => 'Age is required!',
            'position.required'     => 'Postion is required!'
        ];
    }
}
