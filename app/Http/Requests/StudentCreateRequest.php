<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StudentCreateRequest extends FormRequest
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
            'name' => 'max:10|required',
            'nim' => 'unique:students|max:10|required',
            'gender' => 'required',
            'class_id' => 'required',
            'extracurricular_id' => 'required',
            // 'extracurricular_id' => 'required'
        ];
    }

    public function attributes()
    {
        return [
            'class_id' => 'class',
        ];
    }

    public function messages()
    {
        return [
            'nim.required' => 'NIM wajib di isi',
            // 'nim.max' => 'maksimal 8 karakter'
            'nim.max' => 'maksimal :max karakter'
        ];
    }
}
