<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDepartmentRequest extends FormRequest
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
           'name'=>'required|min:2'
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'اسم الدائرة يجب أن لا يكون قيمة فارغة',
            'name.min'=>'الاسم يجب ان لا يقل عن حرفين'
        ];
    }
}
