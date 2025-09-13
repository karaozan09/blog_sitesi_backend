<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class SocialMediaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'social_media_platform' => 'required',
            'social_media_icon' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'social_media_url' => 'required|url',
        ];
    }
    public function messages(): array
    {
        return [
            'social_media_platform.required' => 'Sosyal medya adı zorunludur.',

            'social_media_icon.required' => 'Sosyal medya ikonu zorunludur.',
            'social_media_icon.image' => 'Sosyal medya ikonu resim formatında olmalıdır.',

            'social_media_url.required' => 'Sosyal medya url zorunludur.',
            'social_media_url.url' => 'Sosyal medya linki url formatında olmalıdır.',
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
