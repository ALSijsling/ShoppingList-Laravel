<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GroceriesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'product' => 'required|string|min:2',
            'category' => 'required',
            'quantity' => 'required|integer|min:0',
            'price' => 'required|numeric',
        ];
    }
}
