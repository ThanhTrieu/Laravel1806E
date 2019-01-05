<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLoginPost extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
        // cho phep valaidate data => true
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            // tao ra cac rules - luat rang buoc du lieu(validate data)
            // key : gia tri cua thuoc tinh name cua the input
            // value : la cac rules , moi rules cach nhau boi dau '|'
            'user' => 'required|min:3|max:60',
            'pass' => 'required|min:3|max:60'
        ];
    }

    /* Tao ham thong bao loi ra ngoai trinh duyet*/
    public function messages()
    {
        return [
            // key : gia tri thuoc tinh name cua the input va rules tuong ung cua ham rules ben tren
            // value: message can thong bao
            'user.required' => ':attribute khong duoc de trong',
            'user.min' => ':attribute khong duoc nho hon :min ki tu',
            'user.max' => ':attribute khong duoc lon hon :max ki tu',
            'pass.required' => ':attribute khong duoc de trong',
            'pass.min' => ':attribute khong duoc nho hon :min ki tu',
            'pass.max' => ':attribute khong duoc lon hon :max ki tu'
        ];
    }
}
