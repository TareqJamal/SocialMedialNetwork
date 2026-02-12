<?php

namespace App\Http\Requests\SocialNetwork;

use App\Http\Requests\MainRequest;

class ConnectionRequestRequest extends MainRequest
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
            'connected_id' => 'required|exists:users,id',
        ];
    }

    protected function update(): array
    {
        return [
            'status' => 'required|in:accepted,refused',

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
            'connected_id.required' => __('api.email_required'),
            'connected_id.exists' => __('api.email_unique'),
        ];
    }

}
