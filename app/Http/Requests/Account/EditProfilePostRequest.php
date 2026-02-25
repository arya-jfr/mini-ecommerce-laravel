<?php

namespace App\Http\Requests\Account;

use Illuminate\Foundation\Http\FormRequest;

class EditProfilePostRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => [
                'required',
                'string',
                'persian_alpha',
                'min:2',
                'max:150'
            ],
            'last_name' => [
                'required',
                'string',
                'persian_alpha',
                'min:2',
                'max:150'
            ],
            'mobile' => [
                'required',
                'string',
                'ir_mobile:zero',
                'unique:App\Models\User,mobile,' . auth()->id()
            ],
            'email' => [
                'required',
                'string',
                'email',
                'max:255'
            ],
            'password' => [
                'string',
                'min:8',
                'max:128',
            ],
        ];
    }
}
