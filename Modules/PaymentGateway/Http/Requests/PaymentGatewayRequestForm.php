<?php

namespace Modules\PaymentGateway\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaymentGatewayRequestForm extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'is_virtual'=>['required', 'in:0,1'],
            'is_active'=>['required'],
            'payment_method'=>['required']
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
