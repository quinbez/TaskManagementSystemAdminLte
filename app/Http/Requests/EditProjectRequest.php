<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditProjectRequest extends FormRequest
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
            'title'=>'required',
            // 'category_id' => 'required',
            'description'=>'required',
            'team_member'=>'required',
            'start_date'=>'required',
            'deadline'=>'required',
            // 'status_id'=>'required'
        ];
    }
}
