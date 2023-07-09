<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class QuoteUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return \Illuminate\Support\Facades\Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'id' => 'required|exists:quotes,id',
            'title' => 'required|max:255',
            'client_id' => 'required|exists:clients,id',
            'status_id' => 'required|exists:statuses,id',
            'currency' => 'required|max:255',
        ];
    }
}
