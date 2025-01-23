<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAuthorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:80',
            'birthday' => 'nullable|date|before:today',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Il campo è obbligatorio',
            'name.max' => 'Non puoi superare i :max caratteri',
            'birthday.before' => 'La data deve essere prima di oggi'
        ];
    }
}
