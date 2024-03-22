<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StaffRequestForm extends FormRequest
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

        $settings = getSetting('registration_with');

        $rules = [
            'name' => ['required'],
            'email' => ['required', Rule::unique('users', 'email')->ignore($this->id)],
            'role_id' => ['required'],
            'password' => ['required', 'min:6'],
        ];
        if ($settings == 'email_and_phone') {
            $rules['phone'] = ['required'];
        } elseif ($settings == 'email') {
            $rules['phone'] = ['sometimes', 'nullable'];
        }

        return $rules;
    }
}
