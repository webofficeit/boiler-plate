<?php

namespace App\Http\Requests\Backend;


use Illuminate\Foundation\Http\FormRequest;

/**
 * Description of UpdateCategoryRequest
 *
 * @author dell
 */
class UpdateCategoryRequest extends FormRequest {
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
        //dd(name);
        return [
            'name'  => 'required|max:191',
            'seo'  => 'required|alpha_num|max:191',
            'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }
    
    public function messages() {
        return [
            //'slug.unique' => 'That  unique URL has already been taken.',
            'avatar_location.image' => 'Only jpeg, jpg, png, bmp, gif and svg formats are supported.',
        ];
    }
}
