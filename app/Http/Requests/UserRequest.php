<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UserRequest extends FormRequest
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
            'name' => 'required | min:2 | max:100',
        ] +
          ($this->isMethod('POST') ? $this->store() : $this->update());
    }
    protected function store()
    {
        return [
            'email' => 'required | email | unique:users',
            'password' => 'sometimes | required | confirmed | min:6 | max:20',
        ];
    }

    protected function update()
    {
        return [
            'email' => 'required | email | unique:users,email,'.(int) request()->segment(2),
        ];
    }
}
