<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class AboutRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'full_name' => 'required|min:3|max:255',
            'title' => 'required|min:3',
            'about' =>  'required|min:3|max:255',
        ];
    }
    public function messages(): array
    {
        return [
            'full_name.required'=>'İsim soyisim alanı zorunludur.',
            'full_name.min' => 'İsim soyisim en az :min karakterden oluşmalıdır.',
            'full_name.max' => 'İsim soyisim en fazla :max karakterden oluşmalıdır.',

            'title.required' => 'Başlık alanı zorunludur.(Meslek, alan vs giriniz)',
            'title.min' => 'Başlık en az :min karakterden oluşmalıdır.',

            'about.required' => 'Hakkımda alanı zorunludur.',
            'about.min' => 'Hakkımda en az :min karakterden oluşmalıdır.',
            'about.max' => 'Hakkımda en fazla :max karakterden oluşmalıdır.',
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
