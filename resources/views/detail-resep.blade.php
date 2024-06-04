<!DOCTYPE html>
<html>
<head>
    <title>Detail Resep</title>
    <link href="{{ asset('css/new1.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/templatemo-style.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    
    
</head>
<body>
<div class="container">
        <div class="recipe-container">
            <img src="{{ asset('storage/' . $recipe->gambar_recipe) }}" alt="{{ $recipe->judul_recipe }}" class="recipe-image">
            <br>    
                <h1 class="tm-gallery-title" style="display: flex;justify-content: center;align-items: center;font-size: ; ">{{ $recipe->judul_recipe }}</h1>
                <h2 class="tm-gallery-title">Durasi Masak :</h2>
                <p class="recipe-durasi">{{ $recipe->durasi_recipe }}</p>
                <h2 class="tm-gallery-title">Bahan-Bahan :</h2>
                <p class="recipe-bahan">{{ $recipe->bahan_recipe }}</p>
                <h2 class="tm-gallery-title">Cara Masak :</h2>
                <p class="recipe-cara">{{ htmlspecialchars($recipe->cara_masak)}}</p>
                <h2 class="tm-gallery-title">Deskripsi :</h2>
                <p class="recipe-description">{{ $recipe->deskripsi_recipe  }}</p>
            </br>
        </div>
    </div>
</body>
</html>