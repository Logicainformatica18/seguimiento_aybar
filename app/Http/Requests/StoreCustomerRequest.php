<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCustomerRequest extends FormRequest
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
            'names' => 'required|min:5|max:50',
            'dni' => 'required|min:8|max:15',
            'project_id' => 'required|min:1|max:20',
            'cellphone' => 'required|min:8|max:15',
        'message' => 'nullable|string|max:200',
            'code_country' => 'required',
            'data_aprobed_2'=>'required|accepted',
            'data_aprobed_1'=>'required|accepted'

        ];
    }
    public function messages(){
        return ['message.max' => 'Superó el límite permitido'
    ];
    }
}
