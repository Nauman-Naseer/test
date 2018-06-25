<?php

namespace App\Http\Requests\Blog;

use App\Http\Requests\Request;

class BlogRequest extends Request
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
        if($this->segment(2)){
            return [
                'title'         => 'required',
                'category_id'   => 'required',
                'blog'          => 'required',
            ];
          } else {
            return [
                'title'            => 'required',
                'image'            => 'required_without:video',
                'category_id'      => 'required',
                'blog'             => 'required',
            ];
        }
        
    }
}
