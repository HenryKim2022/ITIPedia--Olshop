<?php

namespace Modules\Support\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class TicketRequestForm extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title'       => ['required', Rule::unique('tickets')->ignore($this->id)],
            'category'    => ['required'],
            'priority'    => ['sometimes', 'nullable'],
            'staffs'      => ['sometimes', 'nullable', 'array'],
            'files'       => ['sometimes', 'image', 'mimes:jpg,png,webp'],
            'description' => ['required', 'min:20'],
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
    public function attributes()
    {
        return [
            'description'=>'details'
        ];
    }
}
