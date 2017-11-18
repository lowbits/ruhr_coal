<?php

namespace App\Http\Requests;

use App\Location;
use Illuminate\Foundation\Http\FormRequest;

class StoreLocationRequest extends FormRequest
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
        return [
            'title' => 'required',
            'description' => 'required',
            'lat' => 'nullable|numeric',
            'lng' => 'nullable|numeric',
            'type' => 'nullable|alpha_num',
            'indoor' => 'nullable|boolean',
            'outdoor' => 'nullable|boolean',
            'city' => 'nullable|alpha',
            'zip' => 'nullable|numeric',
            'adress' => 'nullable',
            'url' => 'nullable',
            'telephone' => 'nullable',
            'photo_url' => 'nullable',
        ];
    }

    public function store()
    {
        Location::create($this->all());

        return response()->json(['success' => 'success'], 200);
    }
}
