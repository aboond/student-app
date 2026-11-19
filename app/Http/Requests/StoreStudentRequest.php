<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;


class StoreStudentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
   public function authorize(): bool 
    { 
        return true; 
    } 
 
    public function rules(): array 
    { 
        return [ 
            'name'       => ['required', 'string', 'max:100'], 
            'email'      => ['required', 'email', 'unique:students,email'], 
            'phone'      => ['nullable', 'regex:/^[0-9+\-\s]{8,15}$/'], 
            'class_name' => ['required', 'string', 'max:50'], 
        ]; 
    } 
 
    public function messages(): array 
    { 
        return [ 
            'class_name.required' => 'Please enter the student\'s class.', 
        ]; 
    } 
}
