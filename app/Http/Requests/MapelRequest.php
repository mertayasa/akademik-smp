<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class MapelRequest extends FormRequest
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
        $rules = [
            'paket' => ['required', Rule::in(['Pelajaran Umum', 'Ekstrakurikuler'])],
            'kelompok' => ['required', Rule::in(['Pagi', 'Siang'])]
        ];
        
        if($this->method() == 'PATCH'){
            $rules += ['nama' => ['required', 'max:50', 'unique:mapel,nama,'.$this->route('mapel')->id]];
        }else{
            $rules += ['nama' => ['required', 'max:50', 'unique:mapel,nama']];
        };

        return $rules;
    }
}
