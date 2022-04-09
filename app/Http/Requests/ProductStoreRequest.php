<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
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
                'category_id'=>'required', 
                'name'=>'required|min:2|max:60', 
                'slug'=>'required|min:2|max:60', 
                'seo_title'=>'nullable|min:2|max:80', 
                'seo_keywords'=>'nullable|min:2|max:200', 
                'seo_description'=>'nullable|min:2|max:200',
                'price'=>'required', 
                'hotprice'=>'nullable' 
        ];
    }
}
