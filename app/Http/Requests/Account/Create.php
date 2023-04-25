<?php

namespace App\Http\Requests\Account;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Exceptions\HttpResponseException;
use \Illuminate\Contracts\Validation\Validator;
use Illuminate\Support\Str;

class Create extends FormRequest
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
            'name' => 'required',
            'email' => 'required|email|unique:accounts',
            'password' => 'required|min:6'
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
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function prepareForValidation(): void {
        $this->merge([
            'name' => Str::upper($this->name)
        ]);
    }

}
