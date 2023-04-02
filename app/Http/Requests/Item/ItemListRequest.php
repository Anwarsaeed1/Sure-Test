<?php

namespace App\Http\Requests\Item;
use App\Http\Requests\BaseFormRequest;
use Illuminate\Validation\Rule;

class ItemListRequest extends BaseFormRequest
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

            'is_active' => ['nullable',Rule::in([1,0])],
            'page' => ['required','integer'],
            'limit' => ['nullable', 'integer','min:10','max:100', Rule::in([10,15,30,50,100])]

        ]; 
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function messages() :array
    {
        return [
            'is_active.in'=>    ':attribute is used in 0,1',
            'page.required'=>   'The :attribute field is required.',
            'page.integer'=>    'The :attribute field is integer value.',
            'limit.required'=>  'The :attribute field is required.',
            'limit.min'=>       'The :attribute field must have at least :min items.',
            'limit.max'=>       'The :attribute field must not have more than :max items.',
            'limit.in'=>        'The :attribute is used in 10,15,30,100',
        ];
    }
}
