<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientStoreRequest extends FormRequest
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
            'pays' => 'required|string|max:50',
            'ville' => 'required|string|max:50',
            'adresse' => 'required',
            
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
            
                'pays' => 'Obligatoire!',
                'ville' => 'Obligatoire!',
                'adresse' => 'Obligatoire!',
                
        ];
    }
}