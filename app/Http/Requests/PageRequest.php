<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Spatie\MediaLibraryPro\Rules\Concerns\ValidatesMedia;

class PageRequest extends FormRequest
{
    use ValidatesMedia;
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; //Auth::user()->harRole('admin);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:191',
            'slug' => '',
            'description' => 'required|string',
            'short_description' => 'required|string|max:191',
            'keywords' => 'required|string',
            'header_1' => 'nullable|string|max:191',
            'header_2' => 'nullable|string|max:191',
            'content_1' => 'nullable|string',
            'content_2' => 'nullable|string',
            'content_3' => 'nullable|string',
            'content_4' => 'nullable|string',
            'notes' => 'nullable|string',
            'online' => '',
            'order' => 'required|numeric',
            'parent_id' => 'required|numeric',
        ];
    }
}
