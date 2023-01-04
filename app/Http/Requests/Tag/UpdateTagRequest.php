<?php

namespace App\Http\Requests\Tag;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTagRequest extends FormRequest
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
            'name' => 'required|unique:tags,name,' . $this->tag->id,
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