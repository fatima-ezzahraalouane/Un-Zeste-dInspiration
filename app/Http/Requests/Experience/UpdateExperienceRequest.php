<?php

namespace App\Http\Requests\Experience;

use Illuminate\Foundation\Http\FormRequest;

class UpdateExperienceRequest extends FormRequest
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
            'title' => 'sometimes|required|string|max:255',
            'image' => 'sometimes|required|string|max:255',
            'description' => 'sometimes|required|string',
            'statut' => 'sometimes|in:En attente,Approuver,Rejeter',
            'theme_id' => 'sometimes|required|exists:themes,id',
            'gourmand_id' => 'sometimes|required|exists:gourmands,id',
        ];
    }
}
