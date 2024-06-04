<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="X-UA-Compatible" content="ie=edge" />
	<title>Simple House Template</title>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400" rel="stylesheet" />
	<link href="{{ asset('css/templatemo-style.css') }}" rel="stylesheet" />
	
</head>
<!--

Simple House


https://templatemo.com/tm-539-simple-house

-->

<body>

	<div class="container">
		<!-- Top box -->
		<!-- Logo & Site Name -->
		<div class="placeholder">
			<div class="parallax-window">
			<img src="{{ asset('images/recipes.jpg') }}" alt="bg" style="width: 100%; height:100vh">

				<div class="tm-header">
					<div class="row tm-header-inner">
						<div class="col-md-6 col-12">
							<img src="{{ asset('images/simple-house-logo.png') }}" alt="Logo" class="tm-site-logo" />
							<div class="tm-site-text-box">
								<h1 class="tm-site-title">Recipes</h1>
								<h6 class="tm-site-description">Ide makanan sehat</h6>
							</div>
						</div>
						<nav class="col-md-6 col-12 tm-nav">
							<ul class="tm-nav-ul">
								<li class="tm-nav-li"><a href="/" class="tm-nav-link active">Home</a></li>
							</ul>
						</nav>
					</div>
				</div>
			</div>
		</div>

		<main>
			<header class="row tm-welcome-section">
				<h2 class="col-12 text-center tm-section-title">Recipes</h2>
				<p class="col-12 text-center">Kumpulan resep masakan sesuai dengan kategori yang anda inginkan!.</p>
			</header>


			<div class="tm-paging-links">
    <nav>
        <ul>
            @foreach($categories as $category)
                <li class="tm-paging-item"><a href="#" class="tm-paging-link" data-category="{{ $category->id_catRecipe }}">{{ $category->nama_catRecipe }}</a></li>
            @endforeach
        </ul>
    </nav>
</div>

	<div class="row tm-gallery">
		@foreach($categories as $category)
		<div id="tm-gallery-page-{{ $category->id_catRecipe }}" class="tm-gallery-page" data-category="{{ $category->id_catRecipe }}">
			@php
			// Determine the number of recipes in the current category
			$recipeCount = count($category->recipe);
			@endphp
	
			@switch($recipeCount)
			@case(1)
				@foreach($category->recipe as $recipe)
				<article class="tm-gallery-item">
					<figure>
					<img src="{{ asset('storage/' . $recipe->gambar_recipe) }}" alt="{{ $recipe->judul_recipe }}" class="img-fluid tm-gallery-img" />
					<figcaption>
						<h4 class="tm-gallery-title"><a href="{{ route('resep.show', $recipe->id_recipe) }}">{{ $recipe->judul_recipe }}</a></h4>
						<p class="tm-gallery-description">{{ $recipe->deskripsi_recipe }}</p>
					</figcaption>
					</figure>
				</article>
				@endforeach
				@break
	
			@case(2)
				@foreach($category->recipe as $recipe)
				<article class="col-sm-6 tm-gallery-item">
					<figure>
					<img src="{{ asset('storage/' . $recipe->gambar_recipe) }}" alt="{{ $recipe->judul_recipe }}" class="img-fluid tm-gallery-img" />
					<figcaption>
						<h4 class="tm-gallery-title"><a href="{{ route('resep.show', $recipe->id_recipe) }}">{{ $recipe->judul_recipe }}</a></h4>
						<p class="tm-gallery-description">{{ $recipe->deskripsi_recipe }}</p>
					</figcaption>
					</figure>
				</article>
				@endforeach
				@break
				@case(3)
				@foreach($category->recipe as $recipe)
				<article class="col-sm-6 tm-gallery-item">
					<figure>
					<img src="{{ asset('storage/' . $recipe->gambar_recipe) }}" alt="{{ $recipe->judul_recipe }}" class="img-fluid tm-gallery-img" />
					<figcaption>
						<h4 class="tm-gallery-title"><a href="{{ route('resep.show', $recipe->id_recipe) }}">{{ $recipe->judul_recipe }}</a></h4>
						<p class="tm-gallery-description">{{ $recipe->deskripsi_recipe }}</p>
					</figcaption>
					</figure>
				</article>
				@endforeach
				@break
	
			@default
				@foreach($category->recipe as $recipe)
				<article class="col-lg-3 col-md-4 col-sm-6 col-12 tm-gallery-item">
					<figure>
					<img src="{{ asset('storage/' . $recipe->gambar_recipe) }}" alt="{{ $recipe->judul_recipe }}" class="img-fluid tm-gallery-img" />
					<figcaption>
						<h4 class="tm-gallery-title"><a href="{{ route('resep.show', $recipe->id_recipe) }}">{{ $recipe->judul_recipe }}</a></h4>
						<p class="tm-gallery-description">{{ $recipe->deskripsi_recipe }}</p>
					</figcaption>
					</figure>
				</article>
				@endforeach
			@endswitch
		</div>
		@endforeach
	</div>
  

<script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/parallax.min.js') }}"></script>

<script>
    $(document).ready(function() {
        $('.tm-paging-link').click(function(e) {
            e.preventDefault();
            var categoryId = $(this).data('category');
            $('.tm-gallery-page').hide();
            $('#tm-gallery-page-' + categoryId).show();
            $('.tm-paging-link').removeClass('active');
            $(this).addClass('active');
        });

        // Tampilkan kategori pertama saat halaman dimuat
        $('.tm-paging-link').first().click();
    });
</script>

