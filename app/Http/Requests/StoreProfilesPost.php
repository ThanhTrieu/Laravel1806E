<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProfilesPost extends FormRequest
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
            'fullname' => 'required|min:3|max:60',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required',
            'date' => 'required',
            'gender' => 'required|numeric',
            'single' => 'required|numeric',
            'description' => 'required'
        ];
    }

    /* Tao ham thong bao loi ra ngoai trinh duyet*/
    public function messages()
    {
        return [
            'fullname.required' => ':attribute khong duoc trong',
            'fullname.min' => ':attribute khong nho hon :min ki tu',
            'fullname.max' => ':attribute khong lon hon :max ki tu',
            'email.required' => ':attribute khong duoc trong',
            'email.email' => ':attribute phai la dinh dang Email',
            'phone.required' => ':attribute khong duoc trong',
            'address.required' => ':attribute khong duoc trong',
            'date.required' => ':attribute khong duoc trong',
            'gender.required' => ':attribute khong duoc trong',
            'gender.numeric' => ':attribute khong hop le',
            'single.required' => ':attribute khong duoc trong',
            'single.numeric' => ':attribute khong hop le',
            'description.required' => ':attribute khong hop le',
        ];
    }
}
