<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class SearchMediaRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'start' => 'nullable|date',
            'end' => 'nullable|date',
            'search' => 'nullable'
        ];
    }
}
