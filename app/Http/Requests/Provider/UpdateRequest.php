<?php

namespace App\Http\Requests\Provider;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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

            'name' =>'required|string|max:255',

            'email' => 'required|email|string|unique:providers,email,'
            .$this->route('provider')->id.'|max:255',


         
            'nit_number' => 'required|string|min:8|unique:providers,nit_number,'
            .$this->route('provider')->id.'|max:10',

            'address' => 'nullable|string|max:200',
            'phone' => 'required|string|min:7|unique:providers,phone,'
            .$this->route('provider')->id.'|max:10',


        ];
    }

    public function messages()
    {
          return [
            'name.required' => 'Este campo es requerido.',
            'name.string' => 'El valor no es correcto.',
            'name.max' => 'Solo se permite 50 carácteres.',
            
            'email.required' => 'Este campo es requerido.',
            'email.email' => 'No es un correo electrónico.',
            'email.string' => 'El valor no es correcto.',
            'email.max' => 'Solo se permiten 200 carácteres.',
            'email.unique' => 'Este email ya se encuentra registrado.',

            'nit_number.required' => 'Este campo es requerido.',
            'nit_number.string' => 'El valor no es correcto.',
            'nit_number.max' => 'Solo se permiten 9 carácteres.',
            'nit_number.min' => 'Solo se permiten 9 carácteres.',
            'nit_number.unique' => 'El NIT ya se encuentra registrado.',

            'address.max' => 'Solo se permite 255 carácteres.',
            'address.string' => 'El valor no es válido.',

            'phone.required' => 'Este campo es requerido.',
            'phone.string' => 'Ingrese un valor númerico!.',
            'phone.max' => 'Solo se permiten 10 carácteres.',
            'phone.min' => 'Solo se permiten 10 carácteres.',
            'phone.unique' => 'Ya existe este número.',
          ];

    }
}
