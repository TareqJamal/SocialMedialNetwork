<?php

namespace App\Http\Requests\SocialNetwork;

use App\Http\Requests\MainRequest;

class UserRequest extends MainRequest
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
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'profile_picture' => 'nullable|image',
            'bio' => 'nullable|string',
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
            'name.required' => __('api.name_required'),
            'name.string' => __('api.name_string'),
            'name.max' => __('api.name_max'),

            'email.required' => __('api.email_required'),
            'email.email' => __('api.email_email'),
            'email.unique' => __('api.email_unique'),

            'password.required' => __('api.password_required'),
            'password.string' => __('api.password_string'),
            'password.min' => __('api.password_min'),
            'password.confirmed' => __('api.password_confirmed'),

            'profile_picture.image' => __('api.profile_picture_image'),
            'profile_picture.mimes' => __('api.profile_picture_mimes'),

            'bio.string' => __('api.bio_string'),

            'phone_code.required' => __('api.phone_code_required'),
        ];
    }

}
