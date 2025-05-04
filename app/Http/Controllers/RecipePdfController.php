<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Fpdf\Fpdf;
use App\Models\Recipe;

class RecipePdfController extends Controller
{
    public function download($id)
    {
        $recipe = Recipe::with('category', 'tags')->findOrFail($id);

        $pdf = new Fpdf();
        $pdf->AddPage();

        // Logo
        $pdf->Image(public_path('images/logo.png'), 10, 10, 30);
        $pdf->Ln(25);

        // Titre
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Cell(0, 10, utf8_decode($recipe->title), 0, 1, 'C');

        // Catégorie & Tags
        $pdf->SetFont('Arial', '', 12);
        $pdf->Ln(5);
        $pdf->Cell(0, 10, utf8_decode("Catégorie : " . ($recipe->category->name ?? 'Non spécifiée')), 0, 1);

        if ($recipe->tags->count()) {
            $tags = implode(', ', $recipe->tags->pluck('name')->toArray());
            $pdf->Cell(0, 10, utf8_decode("Tags : " . $tags), 0, 1);
        }

        // Ingrédients
        $pdf->Ln(5);
        $pdf->SetFont('Arial', 'B', 14);
        $pdf->Cell(0, 10, utf8_decode("Ingrédients"), 0, 1);

        $pdf->SetFont('Arial', '', 12);
        foreach (explode(',', $recipe->ingredients) as $ingredient) {
            $pdf->Cell(0, 8, utf8_decode("- " . trim($ingredient)), 0, 1);
        }

        // Instructions
        $pdf->Ln(5);
        $pdf->SetFont('Arial', 'B', 14);
        $pdf->Cell(0, 10, utf8_decode("Instructions"), 0, 1);

        $pdf->SetFont('Arial', '', 12);
        $steps = explode(',', $recipe->instructions);
        foreach ($steps as $index => $step) {
            $num = $index + 1;
            $pdf->MultiCell(0, 8, utf8_decode("{$num}. " . trim($step)));
        }

        $pdf->Output("I", "recette_" . $recipe->id . ".pdf");
        exit;
    }
}
