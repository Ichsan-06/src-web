<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;


class BannerRequest extends FormRequest
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
        $method = strtolower($this->method());

        $rules = [];
        switch ($method) {
            case 'post':
                $rules = [
                    'title' => 'required|max:20',
                    'file' => 'required',
                ];
                break;
            case 'patch':
                $rules = [
                    'title' => 'required|max:20',
                    'file' => 'required',
                ];
                break;
            default:
                $rules = [
                    'title' => 'required|max:20',
                    'file' => 'required',
                ];
                break;
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'title.*'  =>'Title is required.',
            'file.*'  =>'File is required.',
        ];
    }

     /**
     * @param Validator $validator
     */
    protected function failedValidation(Validator $validator){
        $data = [
            'status' => true,
            'message' => $validator->errors()->first(),
            'all_message' =>  $validator->errors()
        ];

        if ($this->ajax()) {
            throw new HttpResponseException(response()->json($data,422));
        } else {
            throw new HttpResponseException(redirect()->back()->withInput()->with('errors', $validator->errors()));
        }
    }


}
