<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsCommentsRequest extends FormRequest
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
            'text' => 'required|min:5|max:200',
            'news_id' => 'required|integer|exists:news,id',
            'user_id' => 'required|integer|exists:users,id',
        ];
    }
}
