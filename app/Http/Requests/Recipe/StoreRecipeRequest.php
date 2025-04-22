<?php

namespace App\Http\Requests\Recipe;

use Illuminate\Foundation\Http\FormRequest;

class StoreRecipeRequest extends FormRequest
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
            'title'             => 'required|string|max:255',
            'image'             => 'nullable|string',
            'description'       => 'required|string',
            'preparation_time'  => 'required|integer|min:1',
            'cooking_time'      => 'required|integer|min:1',
            'servings'          => 'required|integer|min:1',
            'complexity'        => 'required|in:Facile,Moyen,Difficile',
            'ingredients'       => 'required|string',
            'instructions'      => 'required|string',
            'category_id'       => 'required|exists:categories,id',
            'tags'              => 'nullable|array',
            'tags.*'            => 'exists:tags,id',
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
        ];
    }
}
