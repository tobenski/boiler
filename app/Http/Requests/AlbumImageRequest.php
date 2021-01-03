<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Spatie\MediaLibraryPro\Rules\Concerns\ValidatesMedia;

class AlbumImageRequest extends FormRequest
{
    use ValidatesMedia;
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
        return [
            'album' =>
            $this
                ->validateMultipleMedia()
                ->minItems(0)
                ->maxItems(5)
                ->maxItemSizeInKb(102400),
        ];
    }
}
