<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestValidation extends FormRequest
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
    public function rulesBrand()
    {
        return [
            'brand'=>'required|unique:brands,name|max:255'
        ];
    }
    public function messagesBrand()
    {
        return [
            'brand.required'=>'Полето е задължително',
            'brand.unique'=>'Този атрибут вече съществува',
            'brand.max'=>'Полето е до 255 символа'
        ];
    }
    public function rulesModel()
    {
        return [
            'model'=>'required|unique:models,model|max:255'
        ];
    }
    public function messagesModel()
    {
        return [
            'model.required'=>'Полето е задължително',
            'model.unique'=>'Този атрибут вече съществува',
            'model.max'=>'Полето е до 255 символа'
        ];
    }
    public function rulesEngine()
    {
        return [
            'engine'=>'required|unique:engines,engine|max:255'
        ];
    }
    public function messagesEngine()
    {
        return [
            'engine.required'=>'Полето е задължително',
            'engine.unique'=>'Този атрибут вече съществува',
            'engine.max'=>'Полето е до 255 символа'
        ];
    }
    public function rulesColor()
    {
        return [
            'engine'=>'required|unique:colors,color|max:255'
        ];
    }
    public function messagesColor()
    {
        return [
            'engine.required'=>'Полето е задължително',
            'engine.unique'=>'Този атрибут вече съществува',
            'engine.max'=>'Полето е до 255 символа'
        ];
    }
    public function rulesPrice()
    {
        return [
            'brand'=>'required|numeric|min:0'
        ];
    }
    public function messagesPrice()
    {
        return [
            'brand.required'=>'Полето е задължително',
            'brand.numeric'=>'Въведете положително число',
            'brand.min'=>'Полето е положително число'
        ];
    }
}
