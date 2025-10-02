<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class FooterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
              'footer_title' => 'required',
            'footer_text' => 'required',
        ];
    }
    public function messages(): array
    {
        return [
            'footer_title.required' => 'Footer başlık alanı zorunludur.',
            'footer_text.required' => 'Footer alt metin alanı zorunludur.',
        ];
    }
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success' => false,
            'errors' => $validator->errors()
        ],422));
    }
}
