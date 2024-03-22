<?php

namespace Modules\Support\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class CategoryRequestForm extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', Rule::unique('ticket_categories', 'name')->where('user_id', auth()->user()->id)->ignore($this->id)],
            'is_active'=>['sometimes', 'nullable'],
            'assign_staff'=>['sometimes', 'nullable'],
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
}
