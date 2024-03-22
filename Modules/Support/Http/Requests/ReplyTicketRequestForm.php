<?php

namespace Modules\Support\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReplyTicketRequestForm extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'ticket_id'=>['required', 'integer'],
            'description'=>['required'],
            'files'=>['sometimes', 'image', 'mimes:jpg,png,webp'],
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
