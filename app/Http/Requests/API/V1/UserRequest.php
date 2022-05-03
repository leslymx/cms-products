<?php

namespace App\Http\Requests\API\V1;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => 'required|string|max:50|alpha',
            'email' => 'required|email|unique:users|regex:/(.*)gmail$/i',
            'password' => 'required|string',
            'avatar' => 'nullable|mimes:jpg,png,jpeg, max:1024'
        ];
    }
}
