<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
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
            'name_project' => 'required|string',
            'name_project_ar' => 'required|string',
            'location' =>  'string,max:250',
            'location_ar' =>  'required,string',
            'logo' => 'required|mimes:png,jpg,gif'
        ];
    }
}
