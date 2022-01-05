<?php

namespace App\Http\Requests\Citizen;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreRequest extends FormRequest
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
            'last_name'         => ['required'],
            'first_name'        => ['required'],
            'middle_name'       => ['nullable'],
            'suffix'            => ['nullable'],
            'birthdate'         => ['required', 'date'],
            'sex'               => ['required', Rule::in(['MALE', 'FEMALE'])],
            'philhealth_number' => ['nullable'],
            'mother_name'       => ['nullable'],
            'household'         => ['required', Rule::exists('households', 'id')],
        ];
    }
}
