<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Chatter_postStoreRequest extends FormRequest
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
            'body' => 'required|min:10',
           
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
            'body' => 'Le message à poster est obligatoir!',
        ];
    }
}

