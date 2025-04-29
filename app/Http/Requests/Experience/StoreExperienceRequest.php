<?php

namespace App\Http\Requests\Experience;

use Illuminate\Foundation\Http\FormRequest;

class StoreExperienceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check() && auth()->user()->role->name_user === 'Gourmand';
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'image' => 'required|string|max:255',
            'description' => 'required|string',
            'statut' => 'in:En attente,Approuver,Rejeter',
            'theme_id' => 'required|exists:themes,id',
            'gourmand_id' => 'required|exists:gourmands,id',
        ];
    }
}
