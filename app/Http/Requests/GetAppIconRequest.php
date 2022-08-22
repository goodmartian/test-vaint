<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GetAppIconRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'app' => 'required|string'
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
