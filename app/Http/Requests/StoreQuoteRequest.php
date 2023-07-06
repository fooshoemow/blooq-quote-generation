<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreQuoteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return \Illuminate\Support\Facades\Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules()
    {
        return [
            'title' => ['required'],
            'client_id' => ['required'],
            'number' => ['required'],
            'currency' => [
                'required',
                Rule::in(array_column(config('currencies'), 'code')),
            ],
        ];
    }

    public function messages()
    {
        return [
            'currency.required' => 'The currency field is required.',
            'currency.in' => 'The selected currency is invalid.',
        ];
    }
}
