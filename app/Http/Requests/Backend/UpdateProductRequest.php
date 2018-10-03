<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Requests\Backend;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Description of UpdateProductRequest
 *
 * @author dell
 */
class UpdateProductRequest extends FormRequest {
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
            'name'  => 'required|max:191',
//            'imagelist' => 'image|mimes:jpg,png|max:10000',
//            'pricelist' => 'mimes:doc,pdf,docx'
        ];
    }
}
