<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCourseRequest extends FormRequest
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
    public function rules()
    {

        $array = [
            'code' => 'required|string|max:255|unique:courses,code',
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'features' => 'nullable|array',
            'features.*' => 'string|max:255',
            'estimate_time' => 'required|date|date_format:Y-m-d\TH:i', // Validasi datetime-local
            'is_active' => 'required|boolean',
            'category_id' => 'required',
        ];

        return $array;
    }
}
