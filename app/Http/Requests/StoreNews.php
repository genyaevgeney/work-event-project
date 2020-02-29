<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreNews extends FormRequest
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
                'title' => [
                    'required',
                    'max:30',
                    'min:3',
                    Rule::unique('articles')->ignore($this->article)
                ],
                'subtitle' => 'required|max:100|min:3',
                'content' => 'required'
        ];
    }
}
