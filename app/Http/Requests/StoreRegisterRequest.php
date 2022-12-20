<?php

namespace App\Http\Requests;

use Illuminate\Support\Str;
use Illuminate\Foundation\Http\FormRequest;

class StoreRegisterRequest extends FormRequest
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
        $this->request->add(['username' => Str::slug( $this->username )]);
        return [
            "name" => 'required|max:35',
            "username" => 'required|unique:users|min:3|max:20',
            "email" => 'required|unique:users|email|max:60',
            "password" => 'required|confirmed|min:6'
        ];
    }
}
