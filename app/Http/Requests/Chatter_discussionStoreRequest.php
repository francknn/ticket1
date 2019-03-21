<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Chatter_discussionStoreRequest extends FormRequest
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
            'title'               => 'required|min:5|max:255',
           // 'body_content'        => 'required|min:10',
            //'chatter_category_id' => 'required',
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
            'title'               => 'Le titre est obligatoir',
           // 'body_content'        => 'La description est obligatoir',
            //'chatter_category_id' => 'La categorie est obligatoit veillez choisir une',
        ];
    }
}