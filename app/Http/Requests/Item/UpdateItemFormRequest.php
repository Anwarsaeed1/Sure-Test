<?php

namespace App\Http\Requests\Item;
use App\Http\Requests\BaseFormRequest;

class UpdateItemFormRequest extends BaseFormRequest
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
            'is_active' => ['nullable','in:1,0'],
            'name' => ['required','string','min:3','max:255','unique:items,name,'.$this->item],
            'description' => ['required', 'string','min:3','max:600'],
            'price' => ['required', 'numeric','min:.01','max:10000']
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
            'name.unique'=>   'The :attribute field is unique.',
            'name.min'=>   'The :attribute field must have at least :min items.',
            'name.max'=>   'The :attribute field must not have more than :max items.',
            'description.required'=> 'The :attribute field is required.',
            'description.string'=> 'The :attribute field is string value.',
            'description.min'=>   'The :attribute field must have at least :min items.',
            'description.max'=>   'The :attribute field must not have more than :max items.',
            'price.required'=>   'The :attribute field is required.',
            'price.numeric'=>   'The :attribute field is numeric value.',
            'price.min'=>       'The :attribute field must have at least :min items.',
            'price.max'=>       'The :attribute field must not have more than :max items.',
        ];
    }
}
