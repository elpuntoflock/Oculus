<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactoCreateRequest extends FormRequest
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
            'nombres' => 'required|max:50',
            'apellidos' => 'required',
            'fecha_nac' => 'date_format:d-m-Y|before:today',
        ];
    }

    public function attributes()
{
    return [
        'fecha_nac' => 'Fecha de nacimiento',

    ];
}

    public function messages () 
    {
        return [
            'fecha_nac.before' => 'La fecha de nacimiento debe ser una fecha anterior a hoy.',
        ];
    }
    
}
