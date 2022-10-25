<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditTasksRequest extends FormRequest
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

            'name'=>'required',
            'description'=>'required',
            // 'status'=>'required',
            'start_date'=>'required',
            'end_date'=>'required',
            'user_id'=>'required',
            'project_id'=>'required',
        ];
    }
}
