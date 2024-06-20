<!DOCTYPE html>
<html>
<head>
    <title>Koleksi Video</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link href="{{ asset('css/new1.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/templatemo-style.css') }}" rel="stylesheet" />
</head>
<body>
    <div class="container">
        <h1 class="tm-gallery-title" style="font-size:40px;">Koleksi Video</h1>

        @foreach($categories as $category)
            <div class="category-wrapper"> <!-- Menambahkan wrapper untuk setiap kategori -->
                <h3 class="tm-gallery-title">{{ $category->nama_categories_video }}</h3> <!-- Nama kategori sebagai judul -->
                <div class="horizontal-scroll">
                    @foreach($category->video as $video)
                        <div class="card">
                            <a href="{{ $video->url_video }}" target="_blank">
                                <img class="card-img-top" src="{{ asset('storage/' . $video->gambar_video) }}" alt="Gambar Video">
                            </a>
                            <div class="card-body">
                                <h5 class="tm-gallery-title">{{ $video->judul_video }}</h5>
                                <p class="card-text">{{ $video->deskripsi_video }}</p>
                                <p class="card-text"><strong>Durasi:</strong> {{ $video->durasi_video }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
</body>
</html>