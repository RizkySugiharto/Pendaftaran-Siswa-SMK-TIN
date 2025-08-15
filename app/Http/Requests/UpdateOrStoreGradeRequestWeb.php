<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class UpdateOrStoreGradeRequestWeb extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'MTK' => 'required|string|min:0|max:100',
            'IPA' => 'required|string|min:0|max:100',
            'IPS' => 'required|string|min:0|max:100',
            'English' => 'required|string|min:0|max:100',
            'BIndo' => 'required|string|min:0|max:100',
        ];
    }
}
