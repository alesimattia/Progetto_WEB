<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

// Aggiunti per response JSON
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use Symfony\Component\HttpFoundation\Response;

class ProductSchema extends FormRequest {       //UNA CLASSE PER OGNI FORM

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        // Nella form non mettiamo restrizioni d'uso su base utente
        // Gestiamo l'autorizzazione ad un altro livello
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'nome' => 'required|max:25',
            'subCat' => 'required',
            'prezzo' => 'required|numeric|min:0',
            'percSconto' => 'required|integer|min:0|max:95',
            'descBreve' => 'required|max:50',
            'descEstesa' => 'required|max:500',
            'foto' => 'image|mimes:jpeg,png|max:2048'
        ];
    }

    /** Override del metodo per ottenere un response in formato JSON */
    protected function failedValidation(Validator $validator)
    {                                                                  //costante con codice di errore 442
        throw new HttpResponseException(response($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY));
    }

}
