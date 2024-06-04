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
<body>
  @include('admin.component.adminHeader')
@include('admin.component.sidebar')
<div>
  <h2>Recipe</h2>
  <table class="table ">
    <thead>
      <tr>
        <th class="text-center">ID</th>
        <th class="text-center">Gambar Resep</th>
        <th class="text-center">Judul Resep</th>
        <th class="text-center">Deskripsi Resep</th>
        <th class="text-center">Kategori Makanan</th>
        <th class="text-center">Durasi Masak</th>
        <th class="text-center">Bahan Resep</th>
        <th class="text-center">Cara Masak</th>
        <th class="text-center">Link</th>
        <th class="text-center">Action</th>
      
      </tr>
    </thead>
    <tbody>
      @foreach ($recipe as $item)
      <tr>
        <td>
          {{ $item->id_recipe }}
        </td>
        <td><img height='100px' src='{{ asset('storage/' .$item->gambar_recipe) }}'></td>
        <td>
          {{ $item->judul_recipe }}
        </td>
        <td>
          {{ $item->deskripsi_recipe}}
        </td>
        <td>
              @foreach ($item->categories as $category)
                  {{ $category->nama_catRecipe }}, 
              @endforeach
        </td>
      
        <td>
          {{ $item->durasi_recipe }}
        </td>
        <td>
          {{ $item->bahan_recipe }}
        </td>
        <td>
          {{ $item->cara_masak }}
        </td>
        <td>
          {{ $item->url_video }}
        </td>
        <td>
          <a class="btn btn-primary" style="height:40px" href="{{ route('recipe.edit', $item->id_recipe) }}">Edit</a>
              <form action=" {{ route('recipe.delete',$item->id_recipe) }}" method="POST">
                  @method('DELETE')
                  @csrf
                  <button class="btn btn-danger" style="height:40px"
                  onclick="return confirm('Apakah Anda yakin ingin menghapus resep ini?')">Delete</button>
              </form>
              
      </td>
      </tr>
      @endforeach
     
    </tbody>
  </table>

  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-secondary " style="height:40px" data-toggle="modal" data-target="#myModal">
    Add Recipe
  </button>
  <a  href="{{ route('categories.recipe') }}" class="btn btn-secondary " style="height:40px">
    Add Categories
</a>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Recipe</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form action='{{ route('recipe.add') }}' enctype='multipart/form-data' method="POST">
              @method('POST')
              @csrf
              <div class="form-group">
                  <label for="p_name">Judul Recipe:</label>
                  <input type="text" class="form-control" id="p_name" required name="judul_recipe">
              </div>
              <div class="form-group">
                  <label for="p_price">Durasi Recipe:</label>
                  <input type="time" class="form-control" id="p_price" step="1" name="durasi_recipe">
              </div>
              <div class="form-group">
                  <label for="p_desc">Deskripsi Recipe:</label>
                  <input type="text" class="form-control" id="p_desc"  name="deskripsi_recipe" required>
              </div>
              <div class="form-group">
                <label for="bahan">Bahan Resep:</label>
                <input type="text" class="form-control" id="bahan"  name="bahan_recipe" required>
            </div>
            <div class="form-group">
              <label for="cara">Cara Masak:</label>
              <input type="text" class="form-control" id="cara"  name="cara_masak" required>
          </div>
              <div class="form-group">
                  <label for="urllink">Link</label>
                  <input type="text" class="form-control" id="urllink"  name="url_recipe" required>
              </div>
              
              <div class="form-group">
                  <label for="categories">Categories:</label>
                  <div class="row">
                    @foreach($cat as $index => $category)
                      <div class="col-md-3"> <div class="form-check">
                          <input class="form-check-input" type="checkbox" name="categories[]" value="{{ $category->id_catRecipe }}" id="category_{{ $category->id_catRecipe }}">
                          <label class="form-check-label" for="category_{{ $category->id_catRecipe }}">
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
                  <input type="file" class="form-control-file" id="gambar_video" name="gambar_recipe">
              </div>
              <div class="form-group">
                  <button type="submit" class="btn btn-secondary" id="upload" style="height:40px">Add Recipe</button>
              </div>
          </form>

      </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" style="height:40px">Close</button>
        </div>
      </div>

    </div>
  </div>


</div>
</body>
<script type="text/javascript" src="./assets/js/ajaxWork.js"></script>
<script type="text/javascript" src="./assets/js/script.js"></script>
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
</html>
