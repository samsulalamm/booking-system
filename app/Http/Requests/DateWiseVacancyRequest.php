<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DateWiseVacancyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    /* public function authorize()
    {
        return true;
    } */

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'vdate' => 'required|date',
            'vacancy' => 'required|numeric',
            'price' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'vdate.required' => 'Vacancy date is required',
            'vacancy.required' => 'Vacancy number is required',
        ];
    }
}
