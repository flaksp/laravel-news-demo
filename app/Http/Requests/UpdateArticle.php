<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateArticle extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'id'                   => 'required|numeric|exists:articles',
            'title'                => 'required|string|min:10|max:255',
            'body'                 => 'required|string|min:20|max:65535',
            'cover_url'            => 'nullable|url|max:255',
            'tags'                 => 'nullable|max:255',
            'g-recaptcha-response' => 'required|recaptcha'
        ];
    }
}
