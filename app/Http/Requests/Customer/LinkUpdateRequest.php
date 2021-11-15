<?php

namespace App\Http\Requests\Customer;

use Illuminate\Foundation\Http\FormRequest;

class LinkUpdateRequest extends FormRequest
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
            'url' => ['required','url'],
            'team_id' =>['required'],
            'link_type_id' =>['required'],
        ];
    }

    public function messages()
    {   
        return [ 
            'team_id.required' => 'team is required',
            'link_type_id.required' =>'link type is required ',
        ];
    }
}
