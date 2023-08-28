<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuestionRequest extends FormRequest
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
            'question' =>'required|min:3',
            'answer1'=>'required|min:1',
            'answer2'=>'required|min:1',
            'answer3'=>'required|min:1',
            'answer4'=>'required|min:1',
            'correct_answer'=>'required'

        ];
    }

    public function attributes(){
        return [
            'question' =>'Question',
            'answer1'=>'1. Answer',
            'answer2'=>'2. Answer',
            'answer3'=>'3. Answer',
            'answer4'=>'4. Answer',
            'correct_answer'=>'Correct Answer'
        ];
    }
}
