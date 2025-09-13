<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class SettingRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'background_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'footer_title' => 'required|string|max:255',
            'footer_text' => 'required|string|max:255',
            'email' => 'required|string|email',
            'phone_number' => 'required|max:14',
            'address' => 'required|string|max:255'
        ];
    }
    public function messages(): array{
        return [
            'logo.required' => 'Logo alanı zorunludur.',
            'logo.image' => 'Logo alanı resim olmak zorundadır.',

            'background_image.required' => 'Arkaplan resmi zorunludur.',
            'background_image.image' => 'Arkaplan resmi resim formatında olmalıdır.',

            'footer_title.required' => 'Alt başlık alanı zorunludur.',
            'footer_title.max' => 'Alt başlık alanı en fazla :max karakter olmalıdır.',

            'footer_text.required' => 'Alt metin alanı  zorunludur.',
            'footer_text.max' => 'Alt metin alanı en fazla :max karakter olmalıdır.',

            'email.required' => 'Email alanı zorunludur.',
            'email.email' => 'Email alanı mail formatında olmalıdır.',

            'phone_number.required' => 'Telefon numarası zorunludur.',
            'phone_number.max' => 'Telefon numarası en fazla :max karakter olmalıdır.',

            'address.required' => 'Adres alanı zorunludur.',
            'address.max' => 'Adres alanı en fazla :max karakter olmalıdır.'
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
