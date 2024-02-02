<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReservationRequest extends FormRequest
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
    public function rules()
    {
        return [
            'start_date' => 'required|date_format:Y-m-d|before:end_date',
            'end_date' => 'required|date_format:Y-m-d|after:start_date',
            'adults' => 'required|min:1',
            'kids' => 'nullable|min:0',
        ];
    }
    public function attributes()
    {
        return [
            'start_date' => 'Fecha de Llegada',
            'end_date' => 'Fecha de Salida',
            'adults' => 'Adultos',
            'kids' => 'Niños',
        ];
    }
}
