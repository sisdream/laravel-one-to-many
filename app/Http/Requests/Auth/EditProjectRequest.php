<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditProjectRequest extends FormRequest
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
            'title' => 'required|string|max:100',
            'description' => 'required|string|max:255',
            'type_id' => 'required|exists:types,id',
        ];
    }

    /**
     * Get the error message.
     *
     * @return array<string, mixed>
     */
    public function messages()
    {
        return [
            'title.required' => 'Il titolo non può essere vuoto',
            'title.string' => "Il titolo dev'essere una stringa",
            'title.max' => 'La lunghezza massima è di 100 caratteri',
            'description.required' => "Il progetto deve avere una descrizione.",
            'description.string' => "La descrizione dev'essere un testo",
            'type_id.required' => "La categoria è obbligatoria.",
            'type_id.exists' => "La categoria non esiste.",
        ];
    }
}