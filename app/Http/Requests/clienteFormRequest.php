<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class clienteFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nome'=> 'required|max:120|min:5',
            'telefone'=>'required|max:11|min:11',
            'cpf'=>'required|max:11|min:11|unique:clientes,cpf',
            'endereco'=>'required|max:255',
            'email'=>'required|unique|max:120|unique:clientes,email',
            'password'=> 'required',
            'imagem'=> 'required'
        ];
    }

    public function failedValidation(Validator $validator){
        throw new HttpResponseException(response()->json([
            'success' => false,
            'error'=> $validator->errors()
        ]));
    }

    public function messages(){
        return[
            'nome.required' => 'O campo nome é obrigatório.',
            'nome.max' => 'O campo nome deve conter no máximo 120 caracteres',
            'nome.min' => 'O campo nome deve conter no mínimo 5 caracteres',
            'telefone.required' => 'O campo telefone é obrigatório',
            'telefone.max' => 'O campo telefone deve conter no máximo 11 caracteres',
            'telefone.min' => 'O campo telefone deve conter no míninmo 11 caracteres',
            'endereco.required' => 'O campo endereço é obrigatório',
            'endereco.max' => 'O campo endereço deve conter no máximo 225 caracteres',
            'email.required' => 'O campo email é obrigatório',
            'email.unique' => 'Este email já foi cadastrado no sistema.',
            'email.max' => 'O campo email deve conter no máximo 120 caracteres',
            'cpf.required' => 'O campo cpf é obrigatório',
            'cpf.unique' => 'Este cpf já foi cadastrado no sistema.',
            'cpf.max' => 'O campo cpf deve conter no máximo 11 caracteres',
            'cpf.min' => 'O campo cpf deve conter no mínimo 11 caracteres',
            'password.required' => 'O campo senha é obrigatório'
        ];
    }
}
