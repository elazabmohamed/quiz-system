<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuizUpdateRequest extends FormRequest
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
            'title'=>'required|min:3|max:200',
            'description'=>'required|min:3|max:1000',
            'finished_at'=>'nullable|after:'.now()
        ];
    }

    
    public function attributes(){
        return [
            'title'=>'Quiz Title',
            'description'=>'Quiz Description',
            'finished_at'=>'Ending Date'
        ];
    }
}

