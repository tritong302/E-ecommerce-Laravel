<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**true
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'cus_name' => 'required|string|max:255',
            'cus_email' => 'required|email|max:255',
            'cus_phone' => 'required|string|max:20',
            'cus_address' => 'required|string|max:255',
            'note' => 'nullable|string|max:1000',
        ];
    }
}
