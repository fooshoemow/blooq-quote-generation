<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuoteAddLineItemRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return \Illuminate\Support\Facades\Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'supplier' => 'required|max:255',
            'name' => 'required|max:255',
            'description' => 'nullable|max:500',
            'quantity' => 'required|integer|min:1',
            'currency_code' => 'required|max:255',
            'amount' => 'required|numeric|min:0',
            'quote_id' => 'required|exists:quotes,id',
        ];
    }
}
