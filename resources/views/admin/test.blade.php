<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Test Recipes</title>
</head>
<body>
    <h1>Liste des recettes en attente</h1>

    @if(isset($recipes) && $recipes->count() > 0)
        <ul>
            @foreach($recipes as $recipe)
                <li>
                    <strong>Titre :</strong> {{ $recipe->title }} <br>
                    <strong>Chef :</strong> {{ $recipe->chef->user->name ?? 'Non défini' }}
                </li>
            @endforeach
        </ul>

        {{ $recipes->links() }} <!-- pagination -->
    @else
        <p>Aucune recette en attente.</p>
    @endif
</body>
</html>