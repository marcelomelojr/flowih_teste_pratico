<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class CarRequest extends FormRequest
{
    public function attributes()
    {
        return [
            'name' => 'Nome',
            'model' => 'Modelo',
            'price' => 'Preço',
            'color' => 'Cor',
            'description' => 'Descrição',
        ];
    }
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'price' => 'required|decimal:2',
            'year' => 'required|integer|min:1900|max:2023',
            'color' => 'required|string|max:255',
            'description' => 'nullable|string|max:255'
        ];
    }
}
