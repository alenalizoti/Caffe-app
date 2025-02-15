<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class racunStoreRequest extends FormRequest
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
     */
    public function rules(): array
    {
        return [
            'narudzbina_id' => 'required|numeric|exists:narudzbinas,id',
            'vrsta_placanja' => 'required|in:kes,kartica'
        ];
    }
}
