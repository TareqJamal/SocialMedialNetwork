<?php

namespace App\Http\Requests\SocialNetwork;

use App\Http\Requests\MainRequest;

class PostRequest extends MainRequest
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
            'content' => 'required',
            'images' => 'nullable|array',
            'images.*' => 'nullable|file|image',
        ];
    }

    protected function update(): array
    {
        return [
            'content' => 'nullable',
            'created_at' => 'nullable|date',
            'images' => 'nullable|array',
            'images.*' => 'nullable|file|image',
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
            'content.required' => __('api.content_required'),

        ];
    }

}
