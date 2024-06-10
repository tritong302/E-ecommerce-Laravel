<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CateforyFormRequest extends FormRequest
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
            'cate_name'=>[
                'required',
                'string'
            ],
            'cate_slug'=>[
                'required',
                'string'
            ],
            'cate_banner'=>[
                'nullable',
                'mimes:jpg,jpeg,png'
            ]
        ];
    }
}
