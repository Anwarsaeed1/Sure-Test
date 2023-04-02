<?php

namespace App\Http\Requests\Item;
use App\Http\Requests\BaseFormRequest;

class ItemStatusRequest extends BaseFormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'is_active' => ['required','in:1,0'],

        ];
    }

        /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'is_active.in'=>    ':attribute is used in 0,1',
            'name.required'=>   'The :attribute field is required.',
        ];

    }
}
