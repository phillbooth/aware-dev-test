<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|regex:/^[\pL\s\-]+$/u|max:200',
            'email' => 'required|string|email|max:200|unique:users,email',
            'password' => 'required|string|min:6|max:12|confirmed',
        ];
    }

    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation(): void
    {
        $this->merge([
            'name' => strip_tags($this->input('name')),
            'email' => strip_tags($this->input('email')),
            'password' => strip_tags($this->input('password')),
        ]);
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'name.regex' => 'The name must only contain letters and spaces.',
            'email.email' => 'The email must be a valid email address.',
        ];
    }
}
