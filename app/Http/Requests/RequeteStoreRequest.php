<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequeteStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'titre' => 'required',
            'contenu' => 'required',
            'categorie_id' => 'required'
        ];
    }
     /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
    {
        return [
            'titre' => 'Obligatoir!',
            'contenu' => 'Obligatoir!',
            'categorie_id' => 'Obligatoir!'
 ];
    }
}