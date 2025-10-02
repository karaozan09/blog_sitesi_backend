<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class SkillRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'skill_name' => 'required|string',
            'skill_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }
    public function messages(): array
    {
        return [
            'skill_name.required' => 'Yetenek adı zorunludur.',
            'skill_image.required' => 'Yetenek görseli zorunludur.',
            'skill_image.image'=>'Yetenek görseli resim formatında olmalıdır.'
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
