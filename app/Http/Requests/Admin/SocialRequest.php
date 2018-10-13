<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class SocialRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $request_array = $this->all();
        $request_array['status'] = ($this->status == "on") ? "1" : "0";
        $this->replace($request_array);
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'link' => 'required|string|max:191',
            'icon' => 'required|string|max:191',
        ];
    }
}
