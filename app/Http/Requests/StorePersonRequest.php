<?php

namespace App\Http\Requests;

use App\Rules\CpfIsValidRule;
use Illuminate\Foundation\Http\FormRequest;

class StorePersonRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'social_name' => 'nullable|string|max:255',
            'cpf' => ['required', 'unique:people,cpf', new CpfIsValidRule()],
            'father_name' => 'nullable|string|max:255',
            'mother_name' => 'nullable|string|max:255',
            'phone' => 'required|string',
            'email' => 'required|email|unique:people,email',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'O campo Nome é obrigatório.',
            'name.string' => 'O campo Nome deve ser uma string.',
            'name.max' => 'O campo Nome não pode ter mais de 255 caracteres.',
            
            'social_name.string' => 'O campo Nome Social deve ser uma string.',
            'social_name.max' => 'O campo Nome Social não pode ter mais de 255 caracteres.',
            
            'cpf.required' => 'O campo CPF é obrigatório.',
            'cpf.unique' => 'Já existe um registro com esse CPF.',
            
            'father_name.string' => 'O campo Nome do Pai deve ser uma string.',
            'father_name.max' => 'O campo Nome do Pai não pode ter mais de 255 caracteres.',
            
            'mother_name.string' => 'O campo Nome da Mãe deve ser uma string.',
            'mother_name.max' => 'O campo Nome da Mãe não pode ter mais de 255 caracteres.',
            
            'phone.required' => 'O campo Telefone é obrigatório.',
            'phone.string' => 'O campo Telefone deve ser uma string.',
            
            'email.required' => 'O campo Email é obrigatório.',
            'email.email' => 'O campo Email deve ser um endereço de e-mail válido.',
            'email.unique' => 'Já existe um registro com esse Email.',
        ];
    }

    public function authorize(): bool {
        return true;
    }

    protected function prepareForValidation()
    {
        $this->merge([
            "cpf" => str_replace([".", "-"], "", $this->input("cpf")),
        ]);
    }
}