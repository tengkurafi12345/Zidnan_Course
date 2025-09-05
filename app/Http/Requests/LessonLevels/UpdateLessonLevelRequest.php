<?php

namespace App\Http\Requests\LessonLevels;

use Illuminate\Foundation\Http\FormRequest;

class UpdateLessonLevelRequest extends FormRequest
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
            'program_class_id' => 'required|exists:program_classes,id',
            'code' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'class_level' => 'required|string',
            'start_date' => 'required|date_format:Y-m-d',
            'end_date' => 'required|date_format:Y-m-d',
            'description' => 'required|string|max:255',

        ];
    }
}
