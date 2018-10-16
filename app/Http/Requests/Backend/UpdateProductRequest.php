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
            'category' => 'required',
            'imagelist.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'pricelist' => 'mimes:doc,pdf,docx',
            'datepickerfrom' => 'required_if:toggle_option,==,1',
            'datepickerto' => 'required_if:toggle_option,==,1'
            
        ];
    }
    
    public function messages()
{
    return [
        'datepickerfrom.required_if' => 'datepickerfrom required for option TimePeriod',
        'datepickerto.required_if'  => 'datepickerto required for option TimePeriod'
    ];
}
}
