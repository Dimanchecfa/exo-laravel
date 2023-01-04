<?php

namespace App\Http\Requests\Comment;

use Illuminate\Foundation\Http\FormRequest;

class StoreCommentRequest extends FormRequest
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
            'content' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'user_id.required' => 'You must be logged in to create a comment',
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
