<?php

namespace App\Http\Requests\SocialNetwork;

use App\Http\Requests\MainRequest;

class LoginRequest extends MainRequest
{
    public function rules(): array
    {
        return match ($this->method()) {
            'POST' => $this->store(),
            'PUT', 'PATCH' => $this->update(),
            'DELETE' => $this->destroy(),
            'GET' => $this->view(),
            default => [],
        };
    }

    protected function store(): array
    {
        return [
            'email' => 'required|exists:users,email',
            'password' => 'required',
        ];
    }

    protected function update(): array
    {
        return [
        ];
    }


    protected function destroy(): array
    {
        return [
            // Add your validation rules for deleting resources here
        ];
    }

    protected function view(): array
    {
        return [
            // Add your validation rules for viewing resources here
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => __('admin.email_required'),
            'email.unique' => __('admin.email_unique'),

            'password.required' => __('admin.password_required'),
            'password.min' => __('admin.password_min'),
        ];
    }

}
