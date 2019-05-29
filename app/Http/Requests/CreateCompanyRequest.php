<?php

namespace DevRocks\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCompanyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
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
            'name' => ['required', 'string', 'max:255'],
            //'phone' => ['required', 'string', 'min:9', 'max:15'],
            //'logo' => ['required', 'string', 'image', 'mimes:jpeg,png,jpg,svg', 'max:2048'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:companies'],
            'password' => ['required', 'string', 'min:8', 'confirmed', 'pwned'],
        ];
    }
}
