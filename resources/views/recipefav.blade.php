
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
    max-width: 100px;
    height: auto;
    border-radius: 8px;
}

    </style>

</head>
<body>
<div class="container">
       <div class="container">
    <h1 class="text-center mb-4">Your Favorite Recipes</h1>
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
                    </tr>
                </thead>
                <tbody>
                    @foreach($favoritedRecipes as $favoritedRecipe)
                        <tr>
                            <td>{{ $favoritedRecipe->recipe->judul_recipe }}</td>
                            <td>
                                <img src="{{ asset('storage/' . $favoritedRecipe->recipe->gambar_recipe) }}" alt="{{ $favoritedRecipe->recipe->judul_recipe }}" style="max-width: 100px; height: auto;">
                            </td>
                            <td>{{ $favoritedRecipe->recipe->deskripsi_recipe }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
    </div>
</body>
</html>
