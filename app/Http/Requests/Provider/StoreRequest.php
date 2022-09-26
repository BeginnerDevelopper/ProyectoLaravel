<?php

namespace App\Http\Requests\Provider;

use Illuminate\Foundation\Http\FormRequest;

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

            'name' =>'string|required|max:255',
            'email' => 'email|required|string|max:200|unique:providers|email:rfc,dns', 
            'nit_number' => 'string|required|min:8|max:10|unique:providers',
            'address' => 'nullable|string|max:255',
            'phone' => 'string|required|min:7|max:10|unique:providers',
        ];
    }

    
    public function messages()
    {
        return [


            'name.required' => 'El campo nombre es requerido.',
            'name.string' => 'El valor no es correcto.',
            'name.max' => 'Solo se permite 50 carácteres.',

            'email.required' => 'El correo no ha sido ingresado.',
            'email.email' => 'No es un correo electrónico.',
            'email.string' => 'El valor no es correcto.',
            'email.max' => 'Solo se permiten 200 carácteres.',
            'email.unique' => 'Este email ya se encuentra registrado.',

            'nit_number.required' => 'El campo nit es requerido.',
            'nit_number.string' => 'El valor no es correcto.',
            'nit_number.max' => 'Solo se permiten 11 carácteres.',
            'nit_number.min' => 'El nit solo permite min:8 máx:10 carácteres.',
            'nit_number.unique' => 'El NIT ya se encuentra registrado.',

            'address.max' => 'Solo se permite 255 carácteres.',
            'address.string' => 'El valor no es válido.',

            'phone.required' => 'El campo celular es requerido.',
            'phone.string' => 'Ingrese un valor númerico!.',
            'phone.max' => 'Solo se permiten 10 carácteres.',
            'phone.min' => 'Ingrese 10 carácteres como mínimo.',
            'phone.unique' => 'El número ya está registrado!.',
        ];
    }


}

