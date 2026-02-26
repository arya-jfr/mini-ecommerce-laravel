<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutPostRequest extends FormRequest
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
            'user_province' => [
                'required',
                'string',
                'min:2',
                'max:30'
            ],
            'user_city' => [
                'required',
                'string',
                'min:2',
                'max:30'
            ],
            'user_address' => [
                'required',
                'string',
                'min:3',
                'max:255'
            ],
            'user_postal_code' => [
                'required',
                'string',
                'ir_postal_code'
            ],
            'user_mobile' => [
                'string',
                'ir_mobile:zero'
            ],
            'description' => [
                'string',
                'min:10',
                'max:255'
            ],
        ];
    }
}
