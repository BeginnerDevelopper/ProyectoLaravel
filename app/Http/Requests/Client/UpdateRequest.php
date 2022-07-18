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
                'name' =>'required|string|max:255',     
                'dni'=>'required|unique:clients,name,'
                .$this->route('clients')->id.'|min:10',
                'nit'=>'required|unique:clients,name,'
                .$this->route('clients')->id.'|min:10',
                'address'=>'string|required|max:255',
                'phone'=>'string|required|unique:clients|name,'
                .$this->route('clients')->id.'|min:10',
                'email'=>'string|required|unique:clients|name,'
                .$this->route('clients')->id.'|min:255',  
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
            'dni.max' => 'Solo se permiten 9 carácteres.',
            'dni.min' => 'Solo se permiten 9 carácteres.',
            'dni.unique' => 'El NIT ya se encuentra registrado.',

            'nit.required' => 'Este campo es requerido.',
            'nit.string' => 'El valor no es correcto.',
            'nit.max' => 'Solo se permiten 9 carácteres.',
            'nit.min' => 'Solo se permiten 9 carácteres.',
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
