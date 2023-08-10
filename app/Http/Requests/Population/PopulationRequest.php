<?php

namespace App\Http\Requests\Population;

use Illuminate\Foundation\Http\FormRequest;

class PopulationRequest extends FormRequest
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
            'city_id' => 'required|exists:cities,id',
            'type' => 'required|in:old,young,child',
            'number' => 'required|integer'
        ];
    }
}
