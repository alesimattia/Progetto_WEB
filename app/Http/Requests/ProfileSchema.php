<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileSchema extends FormRequest {       //UNA CLASSE PER OGNI FORM

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
            'residenza' => ['required', 'string', 'max:30'],
            'dataNascita' => ['required', 'date'],
            'occupazione' => ['required', 'string', 'max:30'],
            'username' => ['string', 'min:8', 'unique:utente'],
            'password' => [ 'string', 'confirmed'],
        ];
    }

}
