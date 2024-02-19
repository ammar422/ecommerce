<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class VendorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'logo'=>'required_without:id|mimes:jpg,jpeg,png',
            'name'=>'required|max:100',
            'email'=>'email|required|unique:vendors,email,' . $this->id,
            'phone'=>'max:50|required|unique:vendors,phone,' . $this->id,
            'google_map_address'=>'max:255|required',
            'active'=>'required',
            'category_id'=>'required|exists:main_categories,id',
        ];
    }
}
