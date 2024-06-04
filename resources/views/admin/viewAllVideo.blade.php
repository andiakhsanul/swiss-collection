

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
    <h2>Video</h2>
    <table class="table ">
        <thead>
            <tr>
                <th class="text-center">ID</th>
                <th class="text-center">Gambar video</th>
                <th class="text-center">Judul Video</th>
                <th class="text-center">Deskripsi Video</th>
                <th class="text-center">Kategori Video</th>
                <th class="text-center">Program</th>
                <th class="text-center">Durasi Video</th>
                <th class="text-center">Link</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
            @foreach ($videos as $item)
            <tr>
                <td>
                    {{ $item->id_video }}
                </td>
                <td><img height='100px' src='{{ asset('storage/' .$item->gambar_video) }}'></td>
                <td>
                    {{ $item->judul_video }}
                </td>
                <td>
                    {{ $item->deskripsi_video }}
                </td>
                <td>
                        @foreach ($item->categories as $category)
                            {{ $category->nama_categories_video }}, 
                        @endforeach
                </td>
                <td>
                    @foreach ($item->program as $program)
                        {{ $program->nama_program }}, 
                    @endforeach
            </td>
                
                <td>
                    {{ $item->durasi_video }}
                </td>
                <td>
                    {{ $item->url_video }}
                </td>
                <td>
                    <a class="btn btn-primary" style="height:40px" href="{{ route('video.edit', $item->id_video) }}">Edit</a>
                        <form action=" {{ route('video.delete',$item->id_video) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger" style="height:40px"
                            onclick="return confirm('Apakah Anda yakin ingin menghapus video ini?')">Delete</button>
                        </form>
                        
                </td>
            </tr>
            @endforeach
               
    </table>

    <!-- Trigger the modal with a button -->
    <button type="button" class="btn btn-secondary " style="height:40px" data-toggle="modal" data-target="#myModal">
        Add Video
    </button>
    <a  href="{{ route('categories.video') }}" class="btn btn-secondary " style="height:40px">
        Add Categories
    </a>

    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">New Video</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form action='{{ route('video.add') }}' enctype='multipart/form-data' method="POST">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label for="p_name">Judul Video:</label>
                            <input type="text" class="form-control" id="p_name" required name="judul_video">
                        </div>
                        <div class="form-group">
                            <label for="p_price">Durasi Video:</label>
                            <input type="time" class="form-control" id="p_price" step="1" name="durasi_video">
                        </div>
                        <div class="form-group">
                            <label for="p_desc">Deskripsi Video:</label>
                            <input type="text" class="form-control" id="p_desc"  name="deskripsi_video" required>
                        </div>
                        <div class="form-group">
                            <label for="urllink">Link</label>
                            <input type="text" class="form-control" id="urllink"  name="url_video" required>
                        </div>
                        <div class="form-group">
                            <label for="categories">Categories:</label>
                            <div class="row">
                              @foreach($cat as $index => $category)
                                <div class="col-md-3"> <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="categories[]" value="{{ $category->id_categories_video }}" id="category_{{ $category->id_categories_video }}">
                                    <label class="form-check-label" for="category_{{ $category->id_categories_video }}">
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
                                <div class="col-md-3"> <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="program[]" value="{{ $category->id_program }}" id="category_{{ $category->id_program }}">
                                    <label class="form-check-label" for="category_{{ $category->id_program }}">
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
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-secondary" id="upload" style="height:40px">Add Item</button>
                        </div>
                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"
                        style="height:40px">Close</button>
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