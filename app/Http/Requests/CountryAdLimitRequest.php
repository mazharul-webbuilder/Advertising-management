<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CountryAdLimitRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'code' => 'required|string|min:2|max:2',
            'per_day_ad_limit' => 'required|gt:0'
        ];
    }
}
