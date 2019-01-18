<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContatoRequest extends FormRequest
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
        switch($this->method()){
            case "POST": //criação de registro
                return [
                    'nome' => 'required|max:50',
                    'telefone' => 'required|max:15',
                    'email' => 'email|max:80|unique:contatos',
                    'avatar' => 'nullable|sometimes|image|mimes:jpg,jpeg,png'
                ];
            break;

            case "PUT": //atualização de registro
            return [
                'nome' => 'required|max:50',
                'telefone' => 'required|max:15',
                'email' => 'email|max:80|unique:contatos,email,'.$this->id,
                'avatar' => 'nullable|sometimes|image|mimes:jpg,jpeg,png'
            ];
            break;
        default:break;
        }        
    }

    public function messages()
    {
        return [
            'nome.required' => 'O campo Nome é obrigatório',
            'telefone.required' => 'Insira um numero de Telefone',
            'email.email' => 'Informe um e-mail valido'            
        ];
    }
}
