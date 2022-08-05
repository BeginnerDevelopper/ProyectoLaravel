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
            'nit'=>'nullable|string|unique:clients|min:10|max:10',
            'address'=>'nullable|string|max:255',
            'phone'=>'string|nullable|unique:clients|min:7|max:10',
            'email'=>'string|nullable|unique:clients|max:255|email:rfc,dns',
        
        ];
    }

    public function messages()
    {
          return [
            'name.required' => 'Este campo es requerido.',
            'name.string' => 'El valor no es correcto.',
            'name.max' => 'Solo se permite 50 carácteres.',

            'dni.required' => 'Este campo es requerido.',
            'dni.string' => 'El valor no es correcto.',
            'dni.max' => 'Solo se permiten 10 carácteres.',
            'dni.min' => 'Solo se permiten 6 carácteres.',
            'dni.unique' => 'El NIT ya se encuentra registrado.',

            'nit.required' => 'Este campo es requerido.',
            'nit.string' => 'El valor no es correcto.',
            'nit.max' => 'Solo se permiten 10 carácteres.',
            'nit.min' => 'Solo se permiten 10 carácteres.',
            'nit.unique' => 'El NIT ya se encuentra registrado.',

            'address.max' => 'Solo se permite 255 carácteres.',
            'address.string' => 'El valor no es válido.',

            'phone.required' => 'Este campo es requerido.',
            'phone.string' => 'Ingrese un valor númerico!.',
            'phone.unique' => 'El número ya está registrado!.',

            'email.required' => 'Este campo es requerido.',
            'email.email' => 'No es un correo electrónico.',
            'email.string' => 'El valor no es correcto.',
            'email.max' => 'Solo se permiten 200 carácteres.',
            'email.unique' => 'Este email ya se encuentra registrado.',


         
          ];
}

}