<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ExperienceRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'experience_name' => 'required|string',
            'company_name' => 'required|string',
            'experience_description' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'experience_image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ];
    }
    public function messages(): array
    {
        return [
            'experience_name.required' => 'Deneyim adı zorunludur.',
            'company_name.required' => 'Şirket/Kurum adı zorunludur.',
            'experience_description.required' => 'Deneyim açıklaması zorunludur.',
            'start_date.required' => 'Deneyim başlangıç tarihi zorunludur.',
            'start_date.date' => 'Deneyim başlangıç tarihi, tarih formatında olmalıdır.',
            'end_date.required' => 'Deneyim bitiş tarihi zorunludur.',
            'end_date.date' => 'Deneyim bitiş tarihi, tarih formatında olmalıdır.',
            'experience_image.required' => 'Deneyim görseli zorunludur.',
            'experience_image.image'=>'Deneyim görseli resim formatında olmalıdır.',
            'experience_image.max'=>'Deneyim görseli boyutu en fazla :max olabilir.'
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
