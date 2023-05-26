<?php

namespace App\Http\Requests;

use App\Models\Frequancy;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreFrequancyRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('frequancy_create');
    }

    public function rules()
    {
        return [
            'frequency' => [
                'numeric',
                'required',
                'unique:frequancies,frequency',
            ],
            'frequency_type' => [
                'required',
            ],
            'tag_1' => [
                'string',
                'required',
            ],
            'tag_2' => [
                'string',
                'nullable',
            ],
            'tag_3' => [
                'string',
                'nullable',
            ],
        ];
    }
}
