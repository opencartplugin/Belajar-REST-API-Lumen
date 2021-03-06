<?php

namespace App\Http\Requests;
use Anik\Form\FormRequest;
//---
//before use anik:
//composer require anik/form-request
// bootstrap/app.php
//$app->register(\Anik\Form\FormRequestServiceProvider::class);
//----
class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    protected function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    protected function rules(): array
    {
        return [
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
        ];
    }
}
