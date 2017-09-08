<?php

namespace aerows\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Routing\Redirector;

class PadronRequest extends FormRequest
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
            "cuil"=>"required|digits:11"
        ];
    }

    function messages()
    {
        return [
          "cuil.required" => "El cuil es obligatorio",
          "cuil.digits"     => "El cuil tiene formato incorrecto"
        ];
    }

}
