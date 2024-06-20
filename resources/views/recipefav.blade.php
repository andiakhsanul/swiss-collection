<!DOCTYPE html>
<html>
<head>
    <title>Detail Resep</title>
    <link href="{{ asset('css/new1.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/templatemo-style.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">

    <style>
    /* public/css/styles.css */

    .container {
        padding: 20px;
    }

    h1 {
        color: #333;
    }

    .table {
        width: 100%;
        border-collapse: collapse;
        border-radius: 8px;
    }

    .table th,
    .table td {
        padding: 12px;
        text-align: left;
        vertical-align: middle;
    }

    .table th {
        background-color: #f5f5f5;
        font-weight: bold;
        color: #333;
    }

    .table tbody tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    .table tbody tr:hover {
        background-color: #e0e0e0;
    }

    .recipe-image {
        width: 50%;
        height: 50%;
        border-radius: 8px;
         /* Ensures the image covers the entire area without distortion */
    }

    .btn-danger {
        background-color: #d9534f;
        border-color: #d43f3a;
        color: #fff;
    }

    .btn-danger:hover {
        background-color: #c9302c;
        border-color: #ac2925;
    }
    </style>
</head>
<body>
<div class="container">
    <h1 class="text-center mb-4">Your Favorite Recipes</h1>
    @if(session('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @elseif(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    @if($favoritedRecipes->isEmpty())
        <p class="text-center">No favorite recipes yet.</p>
    @else
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Recipe Name</th>
                        <th scope="col">Recipe Image</th>
                        <th scope="col">Description</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($favoritedRecipes as $favoritedRecipe)
                        <tr>
                            <td><a href="{{ route('resep.show', $favoritedRecipe->recipe->id_recipe) }}">{{ $favoritedRecipe->recipe->judul_recipe }}</a></td>
                            <td>
                                <a href="{{ route('resep.show', $favoritedRecipe->recipe->id_recipe) }}">
                                    <img src="{{ asset('storage/' . $favoritedRecipe->recipe->gambar_recipe) }}" alt="{{ $favoritedRecipe->recipe->judul_recipe }}" class="recipe-image">
                                </a>
                            </td>
                            <td>{{ $favoritedRecipe->recipe->deskripsi_recipe }}</td>
                            <td>
                                <form action="{{ route('unfavorite', $favoritedRecipe->recipe->id_recipe) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fa fa-heart-broken"></i> Unfavorite
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
</body>
</html>