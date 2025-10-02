<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ArticleRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'article_title' => 'required|min:3|max:255',
            'article_content' => 'required|min:3',
            'article_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'article_url' => 'required|url',
//            'slug' => 'required|url',
            'article_date' => 'required|date'
        ];
    }
    public function messages(): array
    {
        return [
          'article_title.required' => 'Makale başlık alanı zorunludur.',
          'article_title.min' => 'Makale başlığı en az :min karakterden oluşmalıdır.',
            'article_title.max' => 'Makale başlığı en fazla :max karakterden oluşmalıdır.',

            'article_content.required' => 'Makale içeriği zorunldur.',
            'article_content.min' => 'Makale içeriği uzunluğu en az :min karakterden oluşmalıdır.',

            'article_image.required' =>'Makale resmi zorunludur.',
            'article_image.image' => 'Makale görseli resim formatında olmalıdır.',

            'article_url.required' => 'Makale linki zorunludur.',
            'article_url.url' => 'Makale linki url formatında olmalıdır.',

            'article_date.required' => 'Makale tarihi zorunludur(ör:2023).',
            'article_date.date' => 'Makale tarihi tarih formatında olmalıdır.'

        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success' => false,
            'errors' => $validator->errors()
        ], 422));
    }
}
