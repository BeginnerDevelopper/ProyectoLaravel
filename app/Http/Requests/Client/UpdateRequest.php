<?php

namespace App\Http\Requests\Client;

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
          'name'=>'string|required|max:255',
          'dni'=>'string|required|unique:clients,dni,'
          .$this->route('client')->id.'|min:8|max:10',
          'nit'=>'nullable|string|unique:clients,nit,'
          .$this->route('client')->id.'|min:11|max:11',
          'address'=>'nullable|string|max:255',
          'phone'=>'string|nullable|unique:clients,phone,'
          .$this->route('client')->id.'|min:7|max:10',
          'email'=>'string|nullable|unique:clients,email,'
          .$this->route('client')->id.'|max:255|email:rfc,dns', 
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
            'dni.min' => 'Solo se permiten 8 carácteres.',
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
