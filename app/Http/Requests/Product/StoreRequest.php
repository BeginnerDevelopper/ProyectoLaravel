<?php

namespace App\Http\Requests\Product;

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

        'name' =>'required|unique:products|max:255',     
        'sell_price'=>'required',
        'category_id'=>'integer|required',
        'provider_id'=>'integer|required',
        'code' =>'nullable|string|max:8|min:8',     
        
        
        ];
    }

    public function messages()
    {
          return [
            'name.required' => 'Este campo es requerido.',
            'name.string' => 'El valor no es correcto.',
            'name.max' => 'Solo se permite 50 carácteres.',
            
            // 'image.required' => 'El valor no es válido.',
            // 'image.dimensions' => 'Alerta ingrese una imagen en 100x200 px.',
            'code.required' => 'El valor no es correcto.',
            'code.string' => 'Solo se permite 8 caracteres.',
            'code.max' => 'Solo se requiere 8 carácteres.',
            
            'sell_price.requires' => 'El campo es requerido.',

            'category_id.integer' => 'El valor tiene que ser entero',
            'category_id.required' => 'El campo es requerido.',
            
            
            'provider_id.integer' => 'El valor tiene que ser entero',
            'provider_id.required' => 'El campo es requerido.',
            

          ];

    }

}
