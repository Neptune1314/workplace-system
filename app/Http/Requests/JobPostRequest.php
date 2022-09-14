<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JobPostRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|min:5',
            'description' => 'required|min:20',
            'role' => 'required|min:5',
            'position' => 'required|min:5',
            'address' => 'required|min:10',
            'type' => 'required',
            'status' => 'required',
            'last_date' => 'required',
            'number_of_vacancy' => 'required|numeric',
            'experience' => 'required',
            'gender' => 'required',
            'salary' => 'required',
        ];
    }
}
