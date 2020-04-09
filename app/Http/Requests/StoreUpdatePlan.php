<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdatePlan extends FormRequest
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
        //Ele pega a posição na URL
        //http://larafood.test/admin(1)/plans(2)/plano-update2(3)/edit(4)
        $url = $this->segment(3);

        return [
            //Criando Exceção na tabela URL na hora de editar pois a tabela é unique
            'name' => "required|min:3|max:255|unique:plans,name,{$url},url",
            'description' => 'nullable|min:3|max:255',
            'price' => "required|regex:/^\d+(\.\d{1.2})?$/",
        ];
    }
}
