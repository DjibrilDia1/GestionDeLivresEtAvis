<?php

namespace App\Http\Controllers;
use App\Models\Book;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(Request $request, Book $book)
    {   
        // il n'existe pas de validation pour le book_id car il est passé en paramètre de la route
        // et donc déjà validé par le middleware de la route
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string|max:255',
        ]);

        // Ajout automatique du book_id a partir de l'URL 
        $validated['book_id'] = $book->getKey();

        Review::create($validated);

        return redirect()
            ->route('books.show', $book->getKey())
            ->with('success', 'Avis ajouté avec succès !');
    }
}

?>