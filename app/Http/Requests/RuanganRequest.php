<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RuanganRequest extends FormRequest
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
        $rules = [];
        
        if($this->method() == 'PATCH'){
            $rules += ['nama' => ['required', 'max:50', 'unique:ruangan,nama,'.$this->route('ruangan')->id]];
        }else{
            $rules += ['nama' => ['required', 'max:50', 'unique:ruangan,nama']];
        };

        return $rules;
    }
}
