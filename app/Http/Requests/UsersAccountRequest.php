<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersAccountRequest extends FormRequest
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
            'nom'=>'required|unique:users,nom',
            'email'=>'required|unique:users,email',
            'password'=>'required',
            'password2'=>'required',
            'prenom'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'nom.required'=>'Le nom est requis',
            'email.required'=>'L email est requis ',
            'password.required'=>'Le mot de passe est requis !',
            'password2.required'=>'La confirmation est  requis !',
            'prenom.required'=>'Le prenom est requis ',
            'email.unique'=>'L email existe déjà dans la base ',

        ];
    }
}
