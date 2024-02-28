<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "name" => "required|max:30|unique:projects",
            "type_id" => "nullable|exists:types,id",
            "description" => "required",
            "assigned_by" => "required",
        ];
    }
    public function messages(){
        return [
            "name.required" => "Il campo name è obbligatorio",
            "name.max" => "Il campo name deve essere di massimo 100 caratteri",
            "name.unique" => "Il campo name deve essere univoco",
            "type_id.exists" => "Il tipo selezionato non esiste",
            "description.required" => "Il campo descrizione è obbligatorio",
            "assigned_by.required" => "Il campo assigned by è obbligatorio",
        ];
    }
}
