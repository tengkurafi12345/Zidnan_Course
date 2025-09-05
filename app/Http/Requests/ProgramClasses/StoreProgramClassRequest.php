<?php

namespace App\Http\Requests\ProgramClasses;

use Illuminate\Foundation\Http\FormRequest;

class StoreProgramClassRequest extends FormRequest
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
            'caption' => 'required|string',
            'description' => 'required|string|max:255',
            'list_of_feature.*' => 'required|string|max:255',
            // logo hanya boleh jpg/jpeg/png, max 2MB
            'logo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Nama kelas program wajib diisi.',
            'name.max' => 'Nama kelas program maksimal 255 karakter.',

            'caption.required' => 'Keteranga Singkat kelas program wajib diisi.',
            'caption.max' => 'Keterangan singkat maksimal 255 karakter.',

            'description.required' => 'Deskripsi kelas program wajib diisi.',
            'description.max' => 'Deskripsi singkat maksimal 255 karakter.',

            'list_of_feature.array' => 'List keunggulan harus berupa array.',
            'list_of_feature.*.required' => 'List keunggulan wajib diisi.',
            'list_of_feature.*.max' => 'Setiap keunggulan maksimal 255 karakter.',

            'logo.image' => 'Logo harus berupa file gambar.',
            'logo.mimes' => 'Logo hanya boleh dalam format jpeg, png, jpg, gif, svg, atau webp.',
            'logo.max' => 'Ukuran logo maksimal 2MB.',
        ];
    }
}
