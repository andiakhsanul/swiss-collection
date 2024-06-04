<link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
            integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
@include('admin.component.adminHeader')
@include('admin.component.sidebar')
<div class="container p-5">

    <h4>Edit video</h4>
   
    <form  id='update-Items'{{ route('video.update', $video->id_video) }} enctype='multipart/form-data' method="POST">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label for="p_name">Judul Video:</label>
            <input type="text" class="form-control" id="p_name" required name="judul_video" value="{{ $video->judul_video }}">
        </div>
        <div class="form-group">
            <label for="p_price">Durasi Video:</label>
            <input type="time" class="form-control" id="p_price" step="1" name="durasi_video" value="{{ $video->durasi_video }}">
        </div>
        <div class="form-group">
            <label for="p_desc">Deskripsi Video:</label>
            <input type="text" class="form-control" id="p_desc"  name="deskripsi_video" required value="{{ $video->deskripsi_video }}">
        </div>
        <div class="form-group">
            <label for="urllink">Link</label>
            <input type="text" class="form-control" id="urllink"  name="url_video" required value="{{ $video->url_video }}">
        </div>
        <div class="form-group">
            <label for="categories">Categories:</label>
            <div class="row">
              @foreach($cat as $index => $category)
                <div class="col-md-3">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="categories[]" value="{{ $category->id_categories_video }}" id="category_{{ $category->id_categories_video }}" 
                      @if ($video->categories->contains($category->id_categories_video)) checked @endif> <label class="form-check-label" for="category_{{ $category->id_categories_video }}">
                      {{ $category->nama_categories_video }}
                    </label>
                  </div>
                </div>
        
                @if (($index + 1) % 4  == 0) <div class="w-100"></div> @endif
              @endforeach
            </div>
          </div>
          <div class="form-group">
            <label for="program">Program:</label>
            <div class="row">
              @foreach($prog as $index => $category)
                <div class="col-md-3">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="program[]" value="{{ $category->id_program }}" id="category_{{ $category->id_program }}" 
                      @if ($video->categories->contains($category->id_program)) checked @endif> <label class="form-check-label" for="category_{{ $category->id_program }}">
                      {{ $category->nama_program }}
                    </label>
                  </div>
                </div>
        
                @if (($index + 1) % 4  == 0) <div class="w-100"></div> @endif
              @endforeach
            </div>
          </div>
        <div class="form-group">
            <label for="file">Choose Image:</label>
            <input type="file" class="form-control-file" id="gambar_video" name="gambar_video">
            <p>Gambar Saat Ini:</p>
            <img src="{{ asset('storage/' . $video->gambar_video) }}" alt="Article Image" style="max-width: 200px;">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-secondary" id="upload" style="height:40px">Add Item</button>
        </div>
    </form>
</div>