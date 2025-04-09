<?php

namespace App\Http\Requests;

use App\Enums\JobCategory;
use App\Enums\JobType;
use App\Enums\WorkPolicy;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreJobApplicantRequest extends FormRequest
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
            "name" => "required|max:255",
            "email" => "required|email|max:255",
            "phone" => "required|numeric",
            "address" => "required|max:255",
            "cover_letter" => "required|max:1000",
            "job_vacancy_id" =>  "required|exists:job_vacancies,id",
//            "resume_file" => "required|max:255",
        ];
    }
}
