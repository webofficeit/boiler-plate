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
        return [
            'name'  => 'required|max:191',
            'seo'  => 'required|max:191',
            'avatar_location' => 'sometimes|image|max:191',
        ];
    }
}
