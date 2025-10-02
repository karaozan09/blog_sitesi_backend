<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ContactRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email' => 'required|email',
            'phone_number' => 'required|max:14',
            'address' => 'required'
        ];
    }
    public function messages(): array
    {
        return [
            'email.required' => 'Email alanı zorunludur.',
            'email.email' => 'Email email(....@gmail.com) formatında olmalıdır.',

            'phone_number.required' => 'Telefon numarası zorunludur.',
            'phone_number.max' => 'Telefon numarası en fazla :max karakter olabilir.',

            'address.required' => 'Adres zorunludur.'
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
