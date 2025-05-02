<?php

namespace App\Http\Requests\Recipe;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRecipeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check() && auth()->user()->role->name_user === 'Chef';
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title'             => 'sometimes|required|string|max:255',
            'image'             => 'sometimes|required|url',
            'description'       => 'sometimes|required|string',
            'preparation_time'  => 'sometimes|required|integer|min:1',
            'cooking_time'      => 'sometimes|required|integer|min:1',
            'servings'          => 'sometimes|required|integer|min:1',
            'complexity'        => 'sometimes|required|in:Facile,Moyen,Difficile',
            'ingredients'       => 'sometimes|required|string',
            'instructions'      => 'sometimes|required|string',
            'category_id'       => 'sometimes|required|exists:categories,id',
            'tags'              => 'nullable|array',
            'tags.*'            => 'exists:tags,id',
            'statut'            => 'nullable|in:En attente,Approuver,Rejeter',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Le titre est obligatoire.',
            'description.required' => 'La description est requise.',
            'preparation_time.required' => 'Le temps de préparation est requis.',
            'cooking_time.required' => 'Le temps de cuisson est requis.',
            'servings.required' => 'Le nombre de portions est requis.',
            'complexity.in' => 'La complexité doit être Facile, Moyen ou Difficile.',
            'category_id.exists' => 'La catégorie sélectionnée est invalide.',
            'tags.*.exists' => 'Un ou plusieurs tags sont invalides.',
            'statut.in' => 'Le statut doit être En attente, Approuver ou Rejeter.',
        ];
    }
}
