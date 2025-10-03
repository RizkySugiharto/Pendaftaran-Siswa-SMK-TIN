<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateCandidateRequest extends FormRequest
{

    protected $minimumAge = 14;
    protected $maximumAge = 18;

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
            'fullname' => 'required|string|max:120',
            'email' => 'required|string|email|max:255',
            'no_telp' => 'required|phone:ID|min:11|max:12',
            'address' => 'required|string',
            'prev_school' => 'required|string|max:120',
            'parent_name' => 'required|string|max:120',
            'parent_telp' => 'required|string|min:11|max:12',
            'parent_email' => 'nullable|string|email|max:255',
            'major' => 'required|string|max:255',
            'birth_date' => 'required|date|before:' . Carbon::now()->subYears($this->minimumAge)->format('Y-m-d').'|after:'. Carbon::now()->subYears($this->maximumAge)->format('Y-m-d'),
            'phase' => 'required|integer',
            'status' => 'required|string|in:unverified,verified,active',
            'gender' => 'required|string|in:male,female',
        ];
    }
}
