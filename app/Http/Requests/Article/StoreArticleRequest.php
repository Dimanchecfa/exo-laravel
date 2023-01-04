<?php

namespace App\Http\Requests\Article;

use Illuminate\Foundation\Http\FormRequest;

class StoreArticleRequest extends FormRequest
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

    public function prepareForValidation()
    {
        $user = auth()->user();
        $this->merge([
            'user_id' => $user->id,
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required',
            'content' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'user_id.required' => 'You must be logged in to create an article',
        ];
    }

    public function failedValidation($validator)
    {
        return response()->json(
            [
                'status' => 'error',
                'message' => $validator->errors(),
            ],
            422
        );
    }
}
