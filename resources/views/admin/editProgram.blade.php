<link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
            integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
@include('admin.component.adminHeader')
@include('admin.component.sidebar')
<div class="container p-5">

    <h4>Edit Recipe</h4>
   
    <form  id='update-Items'{{ route('program.update', $Program->id_program) }} enctype='multipart/form-data' method="POST">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label for="p_name">Nama Program:</label>
            <input type="text" class="form-control" id="p_name" required name="nama_program" value="{{ $Program->nama_program }}">
        </div>
        <div class="form-group">
            <label for="p_price">Durasi Program:</label>
            <input type="time" class="form-control" id="p_price" step="1" name="durasi_program" value="{{ $Program->durasi_program }}">
        </div>
        <div class="form-group">
            <label for="p_desc">Deskripsi Program:</label>
            <input type="text" class="form-control" id="p_desc"  name="deskripsi" required value="{{ $Program->deskripsi }}">
        </div>
        <div class="form-group">
            <label for="p_price">Menit Per Hari:</label>
            <input type="number" class="form-control" id="p_price" step="1" name="menit_per_hari" value="{{ $Program->menit_per_hari }}">
        </div>
        <div class="form-group">
            <label for="categories">Categories:</label>
            <div class="row">
              @foreach($cat as $index => $category)
                <div class="col-md-3">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="categories[]" value="{{ $category->id_catProgram }}" id="category_{{ $category->id_catProgram }}" 
                      @if ($Program->categories->contains($category->id_catProgram)) checked @endif> <label class="form-check-label" for="category_{{ $category->id_catProgram }}">
                      {{ $category->nama_catProgram }}
                    </label>
                  </div>
                </div>
        
                @if (($index + 1) % 4  == 0) <div class="w-100"></div> @endif
              @endforeach
            </div>
          </div>
        <div class="form-group">
            <button type="submit" class="btn btn-secondary" id="upload" style="height:40px">Add Program</button>
        </div>
    </form>
</div>