<?php

namespace App\Http\Requests;

use App\Enums\Gender;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreTeacherRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required|string|max:255',
            'gender' => [
                'required',
                Rule::in(Gender::cases()),
            ],
            'domicile' => 'required|string|max:255',
            'birthplace' => 'required|string|max:255',
            'birthday' => 'required|date_format:Y-m-d',
            'start_joining' => 'required|date_format:Y-m-d',
            'bio' => 'nullable|string|max:255',
        ];
    }
}
