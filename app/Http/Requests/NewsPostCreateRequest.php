<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsPostCreateRequest extends FormRequest
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
        'title' => 'required|min:5|max:200',
        'slug' => 'max:200',
        'content_raw' => 'required|string|min:5|max:10000',
        'category_id' => 'required|integer|exists:news_categories,id',
      ];
    }

    public function messages()
    {
      return [
        'title.required' => 'Введите заголовок статьи',
        'content_raw.required' => 'Минимальная длина значения [5] символов',
      ];
    }
}
