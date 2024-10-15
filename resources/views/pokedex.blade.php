<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Pokedex</title>
    <style>
        .card {
            margin: 10px;
        }

        .card-img-top {
            height: 150px;
            object-fit: cover;
            /* Menjaga proporsi gambar */
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="/">Pokedex</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('pokemon.index') }}">Daftar Pokemon</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <h1 class="text-center">Pokedex</h1>
        <div class="row">
            @foreach ($pokemons as $pokemon)
                <div class="col-md-4">
                    <div class="card text-center">
                        <img src="{{ Storage::url($pokemon->photo) }}"class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">{{ $pokemon->name }}</h5>
                            <p class="card-text">ID: #{{ str_pad($pokemon->id, 4, '0', STR_PAD_LEFT) }}</p>
                            <p class="card-text">Type: {{ $pokemon->primary_type }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="d-flex justify-content-between">
            {{ $pokemons->links('pagination::bootstrap-4', ['class' => 'btn btn-sm']) }}
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
