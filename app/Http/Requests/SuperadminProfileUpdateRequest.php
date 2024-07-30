<?php

namespace App\Http\Requests;

use App\Models\Superadmin;
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
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(Superadmin::class)->ignore($this->user()->id)],
            'cpNumber' => ['nullable', 'string', 'max:20'],
            'address1' => ['required', 'string', 'max:1000'],
            'address2' => ['nullable', 'string', 'max:1000'],
            'address3' => ['nullable', 'string', 'max:1000'],
        ];
    }
}
