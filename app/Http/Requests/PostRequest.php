<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() // 認証
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() // validation のルールはここ
    {
        return [
            //
            "title" => "required | min:3", // タイトルには最低3文字必要
            "body" => "required"
        ];
    }

    public function messages() { // validation のエラーメッセージのカスタマイズ
        return [
            "title.required" => "タイトルを入力せえ！！"
        ];
    }
}
