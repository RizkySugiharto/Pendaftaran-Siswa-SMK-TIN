<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCandidateRequest extends FormRequest
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
            'nik' => 'required|string|min:16|max:16',
            'fullname' => 'required|string|max:120',
            'email' => 'required|string|email|max:255',
            'no_telp' => 'required|string|min:11|max:12',
            'address' => 'required|string',
            'prev_school' => 'required|string|max:120',
            'parent_name' => 'required|string|max:120',
            'parent_telp' => 'required|string|min:11|max:12',
            'parent_email' => 'nullable|string|email|max:255',
            'major' => 'required|string|max:255',
            'birth_date' => 'required|date',
            'gender' => 'required|string|in:male,female',
        ];
    }
}
