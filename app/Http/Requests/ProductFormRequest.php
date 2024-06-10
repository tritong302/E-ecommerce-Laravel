<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductFormRequest extends FormRequest
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

            'name'=>[
                'required'
            ],
            'slug'=>[
                'required'
            ],
            'short_desc'=>[
                'required'
            ],
            'quantity'=>[
                'required'
            ],
            'regular_price'=>[
                'required'
            ],
            'sale_price'=>[
                'required'
            ],
            'description'=>[
                'required'
            ],
            'status'=>[
                'required'
            ],
            'trending'=>[
                'required'
            ], 'featured'=>[
                'required'
            ],
            'best_seller'=>[
                'required'
            ],
            'category_id'=>[
                'required'
            ],
            'manufacturers_id'=>[
                'required'
            ],
            'thumbnail' =>[
                'nullable',

            ]
        ];
    }
}
