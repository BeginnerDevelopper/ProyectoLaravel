<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;

use function PHPUnit\Framework\assertTrue;

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

            'name'=>'string|required|max:255',
            'dni'=>'string|required|unique:clients|min:8|max:10',
            'nit'=>'nullable|string|unique:clients|min:10|max:11',
            'address'=>'nullable|string|max:255',
            'email'=>'string|required|nullable|unique:clients|max:255|email:rfc,dns',
            'phone'=>'string|required|unique:clients|min:7|max:10',
        
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

            'dni.required' => 'Este campo es requerido.',
            'dni.string' => 'El valor no es correcto.',
            'dni.max' => 'Solo se permiten 10 carácteres.',
            'dni.min' => 'Digite la identificación con 10 carácteres como máximo.',
            'dni.unique' => 'Este documento ya se encuentra registrado.',

            'nit.string' => 'Este campo es opcional.',
            'nit.max' => 'Solo se permiten 11 carácteres.',
            'nit.min' => 'El nit solo permite 10 carácteres.',
            'nit.unique' => 'El NIT ya se encuentra registrado.',

            'address.max' => 'Solo se permite 255 carácteres.',
            'address.string' => 'El valor no es válido.',

            'phone.required' => 'Digite el número celular.',
            'phone.string' => 'Ingrese un valor númerico!.',
            'phone.min' => 'Solo se permiten de min:10 a máx:11 carácteres .',
            'phone.unique' => 'El número ya está registrado!.',



         
          ];
}

}