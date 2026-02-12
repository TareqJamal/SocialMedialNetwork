<?php

namespace App\Http\Requests\SocialNetwork;

use App\Http\Requests\MainRequest;

class SearchUserRequest extends MainRequest
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
            'name' => 'nullable|string|max:255',
            'q' => 'nullable|string|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => __('api.name_required'),
            'name.string' => __('api.name_string'),
            'name.max' => __('api.name_max'),
        ];
    }

}
