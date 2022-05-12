<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterAcountRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required|min:10|max:30',
            'password' => 'required'
            
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Tên đăng nhập là bắt buộc',
            'email.required' => 'Email bắt buộc nhập',
            'email.min' => 'Email tối thiểu 10 kí tự',
            'email.max' => 'Email tối đa 30 kí tự',
            'password.required' => 'Password bắt buộc nhập'
        ];
    }
}
