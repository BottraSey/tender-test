<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class TenderUpdateRequest extends Request
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
            'name' => 'required|min:5',
            'description' => 'required|min:10',
            'author_name' => 'required|min:5',
            'phone' => 'required|min:14',
            'active_date' => 'required|regex:/[0-9]{2}\/[0-9]{2}\/[0-9]{4}/|date|after:now',
        ];
    }
}
