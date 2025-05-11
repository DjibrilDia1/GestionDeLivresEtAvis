<!DOCTYPE html>
<html>

<head>
    <title>Liste des livres</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container py-5">
        <h3 class="mb-4">📚 Liste des livres</h3>

        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            @foreach($books as $book)
                <div class="col">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">{{ $book->title }}</h5>
                            <p class="card-text"><strong>Auteur :</strong> {{ $book->author }}</p>
                        </div>
                        <div class="card-footer bg-white border-0">
                            <a href="{{ route('books.show', $book->id) }}" class="btn btn-primary">Détails du livre</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</body>

</html>