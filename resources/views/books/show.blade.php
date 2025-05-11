<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Détails du livre</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container py-5">

        <!-- Détails du livre -->
        <h5 class="mb-3 text-decoration-underline">Détails du livre</h5>
        <div class="card mb-4 shadow">
            <div class="card-body">
                <h5 class="card-subtitle mb-2 ">Titre: {{$book->title }}</h5>
                <h6 class="card-subtitle mb-2 text-muted ">Auteur: {{ $book->author }}</h6>
                <p class="card-text">Description: {{ $book->description }}</p>
                <p class="text-secondary">Publié le : {{ $book->published_at }}</p>
            </div>
        </div>

        <!-- Liste des avis -->
        <h5 class="mb-3 text-decoration-underline">Avis</h5>
        @forelse($book->reviews as $review)
            <div class="card mb-3 border-start border-primary border-2 shadow-sm">
                <div class="card-body">
                    <h6 class="card-subtitle mb-2 text-primary">{{ $review->user->name }}</h6>
                    <p class="mb-1">Note : ⭐ {{ $review->rating }}/5</p>
                    <p class="card-text">{{ $review->comment }}</p>
                </div>
            </div>
        @empty
            <p class="text-muted">Aucun avis pour ce livre.</p>
        @endforelse

        <!-- Ajouter un avis -->
        <div class="card mb-5 shadow">
            <div class="card-header bg-secondary text-white">
                <h5 class="mb-0">Ajouter un avis</h5>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('reviews.store', $book->id) }}">
                    @csrf

                    <div class="mb-3">
                        <label for="user_id" class="form-label">Utilisateur</label>
                        <select name="user_id" id="user_id" class="form-select" required>
                            @foreach(\App\Models\User::all() as $user)
                                <option value="{{ $user->id }}"> {{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="rating" class="form-label">Note (1-5)</label>
                        <input type="number" name="rating" id="rating" class="form-control" min="1" max="5" required>
                    </div>

                    <div class="mb-3">
                        <label for="comment" class="form-label">Commentaire</label>
                        <textarea name="comment" id="comment" class="form-control" rows="3" required></textarea>
                    </div>

                    <button type="submit" class="btn btn-success">Envoyer l'avis</button>
                </form>
            </div>
        </div>

    </div>
</body>

</html>