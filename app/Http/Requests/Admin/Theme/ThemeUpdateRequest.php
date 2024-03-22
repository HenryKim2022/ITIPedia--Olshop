<?php

namespace App\Http\Requests\Admin\Theme;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ThemeUpdateRequest extends FormRequest
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
            "theme_ids"       => "nullable|array",
            "active_theme_id" => "required|exists:themes,id"
        ];
    }
}
