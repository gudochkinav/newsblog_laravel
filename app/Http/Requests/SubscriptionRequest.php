<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubscriptionRequest extends FormRequest
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
            'name' => 'required|min:3|max:255',
            'email' => 'required|max:255|email:rfc,dns'
        ];
    }
    
//    public function messages() 
//    {
//        return [
//            'name.required' => 'A name is required',
//            'name.min' => 'Name should be more than :min characters',
//            'name.max'=> 'Name should be less than :max characters',
//            'email.required' => 'A email is required',
//            'email.max' => 'Email should be less than :min characters'
//        ];
//    }
}
