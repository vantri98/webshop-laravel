<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderAddRequest extends FormRequest
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
            'name' => 'required|max:255',
            'description' => 'required',
            'image_path' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên slider không đươc để trống',
            'name.max' => 'Tên slider được quá 255 ký tự',
            'description.required'  => 'Mô tả silder không được để trống',
            'image_path.required'  => 'Hình ảnh không được để trống',
        ];
    }
}
