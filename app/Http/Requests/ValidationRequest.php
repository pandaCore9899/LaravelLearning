<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


// Validation for Request
class ValidationRequest extends FormRequest
{
    // redirect if errors
    // protected $redirect = '/';
    // protected $redirectRoute = 'welcome';

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
            'name' => 'required|max:10',
            'email' => 'required|email'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nhap Ten Di Be ',
            'name.max' => 'Nhap qua roi be oi :attribute',
            'email.email' => ':attribute cua Be Sai Roi'
        ];
    }
    
    //replace :attribute with value
    public function attributes()
    {
        return [
            'name' => 'Validation name',
            'email' => 'Email'
        ];
    }
}
