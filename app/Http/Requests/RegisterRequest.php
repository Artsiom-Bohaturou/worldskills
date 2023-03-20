<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return !Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|min:5',
            'login' => 'required|string|min:5|unique:users,login',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'confirmed' => 'accepted',
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge(['login' => $this->register_login]);
    }
}
