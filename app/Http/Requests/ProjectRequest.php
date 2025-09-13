<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ProjectRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'project_name' => 'required|max:255',
            'project_description' => 'required|max:255',
            'link' => 'required|url',
            'project_programming_languages' => 'required|array'
        ];
    }
    public function messages(): array
    {
        return [
            'project_name.required' => 'Proje adı zorunludur.',
            'project_name.max' => 'Proje adı :max karakter olabilir.',

            'project_description.required' => 'Proje açıklaması zorunludur.',
            'project_description.max' =>'Proje açıklaması :max karakter olabilir.',

            'link.required' => 'Proje linki zorunludur.',
            'link.url' => 'Proje linki url formatında olmalıdır.',

            'project_programming_languages.required' => 'Projede kullanılan diller zorunludur.',
            'project_programming_languages.array' => 'Projede kullanılan diller dizi şeklinde girilmelidir.'
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
