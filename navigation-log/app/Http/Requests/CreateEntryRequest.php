<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateEntryRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'entry' => 'required',
            'locations_id' => 'required|numeric',
            'title' => 'required',
            'user_id' => 'required|numeric',
            'category_id.*' => 'required|numeric'
        ];
    }

    public function messages(): array
    {
        return [
            'entry.required' => 'entry must be filled',
            'locations_id.required' => 'location must be filled',
            'locations_id.numeric' => 'location must be a number',
            'title.required' => 'title must be filled',
            'user_id.required' => 'userid must be filled',
            'user_id.numeric' => 'userid must be a number',
            'category_id.*.required' => 'category_id must be filled',
            'category_id.*.numeric' => 'category_id must be a number',
        ];
    }
}
