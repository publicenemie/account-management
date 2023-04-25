<?php

namespace App\Http\Requests\Account;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class Get extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     * @return array
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function failedValidation(Validator $validator): void {
        throw new HttpResponseException(
            response()->json($validator->errors(), 400)
        );
    }

    /**
     * Prepare the data for validation.
     * @return void
     */
    protected function prepareForValidation()
    {
        $this->merge([
            'page' => 1,
            'per_page' => 10,
            'sort_by' => 'id'
        ]);
    }
}
