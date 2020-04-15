<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserCreateRequest extends FormRequest
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
          'name' => 'required|min:3|max:60',
          'surname' => 'required|min:3|max:60',
          'password' => 'required|min:8|confirmed',
          'date_of_birthday' => 'required|date',
          'email' => 'required|email|unique:users',
          'tel' => 'numeric|regex:/^(0)[0-9]{9}$/',
        ];
    }
}
