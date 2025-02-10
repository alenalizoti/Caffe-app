<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class userUpdateRequest extends FormRequest
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
            'ime' => 'required|min:3|string|max:255',
            'prezime' => 'required|min:3|max:255|string',
            'username' => 'required|min:4|max:255|string|unique:users,username,' . request()->route('user')->id,
            'plata' => 'required|numeric',
            'tip_korisnika_id' => 'required|exists:tip_korisnikas,id',
            
        ];
    }
}
