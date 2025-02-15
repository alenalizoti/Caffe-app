<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class narudzbinaStoreRequest extends FormRequest
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
            'sto_id' => 'required|exists:stos,id',
            'iznos' => 'required|numeric',
            'items' => 'required|array',
            'items.*.product_id' => 'required|exists:proizvods,id',
            'items.*.quantity' => 'required|integer',
        ];
    }
}
