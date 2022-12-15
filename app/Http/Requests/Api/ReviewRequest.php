<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class ReviewRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'fullName' => ['required', 'string', 'max:255'],
            'phoneNumber' => ['required', 'numeric'],
            'reviewChoice'=> ['required', 'string'],
            'country' => ['required', 'string'],
            'socialMedia' => ['required', 'string'],
            'note'=> ['required', 'string'],
        ];
    }
}
