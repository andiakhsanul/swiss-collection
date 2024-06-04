<link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
            integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
@include('admin.component.adminHeader')
@include('admin.component.sidebar')
<div class="container p-5">

    <h4>Edit Recipe</h4>
   
    <form  id='update-Items'{{ route('recipe.update', $recipe->id_recipe) }} enctype='multipart/form-data' method="POST">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label for="p_name">Judul Recipe:</label>
            <input type="text" class="form-control" id="p_name" required name="judul_recipe" value="{{ $recipe->judul_recipe }}">
        </div>
        <div class="form-group">
            <label for="p_price">Durasi Recipe:</label>
            <input type="time" class="form-control" id="p_price" step="1" name="durasi_recipe" value="{{ $recipe->durasi_recipe }}">
        </div>
        <div class="form-group">
            <label for="p_desc">Deskripsi Recipe:</label>
            <input type="text" class="form-control" id="p_desc"  name="deskripsi_recipe" required value="{{ $recipe->deskripsi_recipe }}">
        </div>
        <div class="form-group">
          <label for="bahan">Bahan Resep:</label>
          <input type="text" class="form-control" id="bahan"  name="bahan_recipe" value="{{ $recipe->bahan_recipe }}" required>
      </div>
      <div class="form-group">
        <label for="cara">Cara Masak:</label>
        <input type="text" class="form-control" id="cara"  name="cara_masak" required value="{{ $recipe->cara_masak }}">
    </div>
        <div class="form-group">
            <label for="urllink">Link</label>
            <input type="text" class="form-control" id="urllink"  name="url_recipe" required value="{{ $recipe->url_recipe }}">
        </div>
        <div class="form-group">
            <label for="categories">Categories:</label>
            <div class="row">
              @foreach($cat as $index => $category)
                <div class="col-md-3">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="categories[]" value="{{ $category->id_catRecipe }}" id="category_{{ $category->id_catRecipe }}" 
                      @if ($recipe->categories->contains($category->id_catRecipe)) checked @endif> <label class="form-check-label" for="category_{{ $category->id_catRecipe }}">
                      {{ $category->nama_catRecipe }}
                    </label>
                  </div>
                </div>
        
                @if (($index + 1) % 4  == 0) <div class="w-100"></div> @endif
              @endforeach
            </div>
          </div>
        <div class="form-group">
            <label for="file">Choose Image:</label>
            <input type="file" class="form-control-file" id="gambar_recipe" name="gambar_recipe">
            <p>Gambar Saat Ini:</p>
            <img src="{{ asset('storage/' . $recipe->gambar_recipe) }}" alt="Article Image" style="max-width: 200px;">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-secondary" id="upload" style="height:40px">Add Recipe</button>
        </div>
    </form>
</div>