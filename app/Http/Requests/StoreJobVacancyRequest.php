<?php

namespace App\Http\Requests;

use App\Enums\JobCategory;
use App\Enums\JobType;
use App\Enums\WorkPolicy;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreJobVacancyRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'location' => 'required|string',
            'category' => ['required', Rule::in(JobCategory::values())],
            'job_type' => ['required', Rule::in(JobType::values())],
            'work_policy' => ['required', Rule::in(WorkPolicy::values())],
            'salary_min' => 'required|numeric',
            'salary_max' => 'required|numeric',
            'date_line' => 'required|date_format:Y-m-d',
            'job_description' => 'required|string|max:255',
            'responsibilities.*' => 'required|string|max:255',
            'responsibility_description' => 'required|string|max:255',
            'qualifications.*' => 'required|string|max:255',
            'qualification_description' => 'required|string|max:255',
        ];
    }
}
