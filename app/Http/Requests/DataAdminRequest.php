<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DataAdminRequest extends FormRequest
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
        $today = Carbon::now()->format('Y-m-d');
        $rules = [
            'nama' => ['required', 'max:50', 'min:5'],
        ];

        if($this->method() == 'PATCH'){
            $rules += ['email' => ['required', 'unique:users,email,'.$this->route('user')->id]];
           
            // $rules += ['status' => ['required', Rule::in(['aktif', 'nonaktif'])]];
            if($this->password != null){
                $rules += ['password' => ['required', 'min:6', 'confirmed']];
            };
        }else{
            $rules += ['email' => ['required', 'unique:users,email']];
            $rules += ['password' => ['required', 'min:6', 'confirmed']];
        };
        

        return $rules;
    }

}
