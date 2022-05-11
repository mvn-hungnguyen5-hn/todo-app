<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserPostRequest extends FormRequest
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
            'name' => 'required|min:5|max:15',
            'email' => 'required',
            'password' => 'required|min:6|max:12',
            'level' =>'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên đăng nhập bắt buộc nhập',
            'email.required' => 'Email bắt buộc nhập',
            'password.required' => 'Password bắt buộc nhập',
            'level.required' => "Kiểu account bắt buộc nhập"
        ];
    }
}
