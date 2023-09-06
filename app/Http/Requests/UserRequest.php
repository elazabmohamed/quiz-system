<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name'=>'required|min:3|max:200',
            'email'=>'required|min:4|max:200|email|unique:users',
            'password'=>['required','min:8', 'max:240', 'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x]).*$/']
        ];
    }

    public function attributes(){
        return [
            'name'=>'Name',
            'email'=>'Email',
            'password'=>'Password'
        ];
    }
}
