<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePacketCombinationRequest extends FormRequest
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
            'packet_id' => [
                'required',
                'exists:packets,id',
            ],
            'program_id' => [
                'required',
                'exists:programs,id',
//                Rule::unique('packet_combinations')
//                ->where('packet_id', $this->packet_id)
//                ->where('program_id', $this->program_id)
//                ->ignore($this->route('packet_combination'))
            ],
            'price' => 'required|numeric',
            'status' => 'boolean',
        ];
    }
}
