<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use Symfony\Component\HttpFoundation\Response;

class StaffSchema extends FormRequest {       //UNA CLASSE PER OGNI FORM

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
            'nome' => ['required', 'string', 'max:20'],
            'cognome' => ['required', 'string', 'max:20'],
            'username' => ['required', 'string', 'min:8', 'unique:utente'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ];
    }
    
    protected function failedValidation(Validator $validator)
    {                                                                  //costante con codice di errore 442
        throw new HttpResponseException(response($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY));
    }
}
