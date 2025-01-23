<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBookRequest extends FormRequest
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
            'title' => 'required|string|max:100',
            'description' => 'nullable|string|max:800',
            'pages' => 'nullable|integer|min:1',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'author_id' => 'required|integer|exists:authors,id',
            'category_id' => 'required|integer|exists:categories,id'
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Il campo è obbligatorio',
            'title.max' => 'Non puoi superare i :max caratteri',
            'description.max' => 'Non puoi superare i :max caratteri',
            'pages.integer' => 'Il valore deve essere un numero',
            'pages.min' => 'Il numero di pagine deve essere maggiore di :min',
            'image.image' => 'Il file caricato deve essere un immagine',
            'image.max' => "L'immagine può essere al massimo di 2MB",
            'image.mimes' => 'Il formati supportati di immagine sono: jpeg,jpg,png,gif,webp',
            'author_id.required' => 'Il campo è obbligatorio',
            'author_id.exists' => 'Il campo deve fare riferimento ad un autore esistente',
            'category_id.required' => 'Il campo è obbligatorio',
            'category_id.exists' => 'Il campo deve far riferimento ad una categoria esistente'
        ];
    }
}
