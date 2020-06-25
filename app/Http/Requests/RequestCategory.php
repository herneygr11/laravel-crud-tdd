<?php

namespace App\Http\Requests;

use App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;

class RequestCategory extends FormRequest
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
        $category = isset($this->category->id) ? "," . $this->category->id : "";

        return [
            "name"          => "bail|required|min:6|max:50|unique:categories,name" . $category,
            "description"   => "bail|required|min:10|max:200|unique:categories,description" . $category,
        ];
    }
}
