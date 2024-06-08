<!DOCTYPE html>
<html>

<head>
    <title>Admin</title>

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
            integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
        </link>
    </head>
</head>

<style>
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
<body>
  @include('admin.component.adminHeader')
@include('admin.component.sidebar')
<div class="container">
    <h1 class="text-center mb-4">All User Favorite Recipes</h1>
    @if($allFavorites->isEmpty())
        <p class="text-center">No favorite recipes yet.</p>
    @else
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">User Name</th>
                        <th scope="col">User Email</th>
                        <th scope="col">Recipe Name</th>
                        <th scope="col">Recipe Image</th>
                        <th scope="col">Description</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($allFavorites as $favoritedRecipe)
                        <tr>
                            <td>{{ $favoritedRecipe->user->first_name }} {{ $favoritedRecipe->user->last_name }}</td>
                            <td>{{ $favoritedRecipe->user->email }}</td>
                            <td>{{ $favoritedRecipe->recipe->judul_recipe }}</td>
                            <td>
                                <img src="{{ asset('storage/' . $favoritedRecipe->recipe->gambar_recipe) }}" alt="{{ $favoritedRecipe->recipe->judul_recipe }}" class="recipe-image">
                            </td>
                            <td>{{ $favoritedRecipe->recipe->deskripsi_recipe }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
</body>
<script type="text/javascript" src="./assets/js/ajaxWork.js"></script>
<script type="text/javascript" src="./assets/js/script.js"></script>
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
</html>
