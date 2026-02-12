<?php

namespace App\Http\Requests\SocialNetwork;

use App\Http\Requests\MainRequest;

class CommentRequest extends MainRequest
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
            'post_id' => 'required|exists:posts,id',
            'parent_id' => 'nullable|exists:posts,id',
        ];
    }

    protected function update(): array
    {
        return [
            'content' => 'nullable',
            'post_id' => 'nullable|exists:posts,id',
            'parent_id' => 'nullable|exists:posts,id',
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
