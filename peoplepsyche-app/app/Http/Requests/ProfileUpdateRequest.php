<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'givenName' => ['required', 'string', 'max:255'],
            'middleName' => ['nullable', 'string', 'max:255'],
            'lastName' => ['required', 'string', 'max:255'],
            'suffixName' => ['nullable', 'string', 'max:10'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
            'cpNumber' => ['nullable', 'string', 'max:20'],
            'birthday' => ['required', 'date'],
            'sex' => ['required', Rule::in(['Male', 'Female', 'Other'])],
            'civilStat' => ['required', Rule::in(['Single', 'Married', 'Separated', 'Divorced', 'Widowed'])],
            'religion' => ['nullable', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:1000'],
            'address2' => ['nullable', 'string', 'max:1000'],
            'address3' => ['nullable', 'string', 'max:1000'],
        ];
    }
}
