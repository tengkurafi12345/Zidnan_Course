<?php

namespace App\Http\Requests\ProgramClasses;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProgramClassRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'caption' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string'],

            // list_of_feature bisa array
            'list_of_feature' => ['nullable', 'array'],
            'list_of_feature.*' => ['nullable', 'string', 'max:255'],

            // Logo optional saat update
            'logo' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg,webp', 'max:2048'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Nama kelas program wajib diisi.',
            'name.max' => 'Nama kelas program maksimal 255 karakter.',

            'caption.max' => 'Keterangan singkat maksimal 255 karakter.',

            'list_of_feature.array' => 'List keunggulan harus berupa array.',
            'list_of_feature.*.max' => 'Setiap keunggulan maksimal 255 karakter.',

            'logo.image' => 'Logo harus berupa file gambar.',
            'logo.mimes' => 'Logo hanya boleh dalam format jpeg, png, jpg, gif, svg, atau webp.',
            'logo.max' => 'Ukuran logo maksimal 2MB.',
        ];
    }
}
