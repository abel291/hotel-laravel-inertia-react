<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserCheckoutRequest extends FormRequest
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
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            // 'email' => 'required|email|confirmed|max:250',
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'note' => 'nullable|string|max:255',
            'newsletter' => 'boolean',
            'terms' => 'required|accepted',
        ];
    }
    public function attributes(): array
    {
        return [
            'email' => 'Email',
            'name' => 'Nombre',
            'phone' => 'Telefono',
            'country' => 'Pais',
            'city' => 'Ciudad',
            'note' => 'Comentario o petición ',
            'newsletter' => 'Newsletter',
            'terms' => 'Terminos y condiciones',
        ];
    }
}
