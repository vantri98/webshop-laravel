<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductAddRequest extends FormRequest
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
            'name' => 'required|unique:products|max:255|min:10',
            'price' => 'required',
            'category_id' =>'required',
            'contents' =>'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên không được phép để trống',
            'name.unique' => 'Tên không được phép để trùng',
            'name.max' => 'Tên không được quá 255 ký tự',
            'name.min' => 'Tên không được dưới 10 ký tự',
            'price.required'  => 'Giá không được phép để trống',
            'category_id.required' => 'Danh mục sản phẩm không được để trống',
            'contents.required' => 'Nội dung không được để trống'
        ];
    }
}
