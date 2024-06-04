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
    <h2>Program</h2>
    <table class="table ">
        <thead>
            <tr>
                <th class="text-center">ID</th>
                <th class="text-center">Nama Program</th>
                <th class="text-center">Deskripsi Program</th>
                <th class="text-center">Durasi Program</th>
                <th class="text-center">Menit Per Hari</th>
                <th class="text-center">Kategori</th>
                <th class="text-center">Action</th>
                
            </tr>
        </thead>
        @foreach ($Program as $item)
        <tr>
            <td>
                {{ $item->id_program }}
            </td>
            <td>
                {{ $item->nama_program }}
            </td>
            <td>
                {{ $item->deskripsi }}
            </td>
            <td>
                {{ $item->durasi_program }}
            </td>
            <td>
                {{ $item->menit_per_hari }}
            </td>
            <td>
                @foreach ($item->categories as $category)
                    {{ $category->nama_catProgram }}, 
                @endforeach
            </td>
            <td>
                <a class="btn btn-primary" style="height:40px" href="{{ route('program.edit', $item->id_program) }}">Edit</a>
                    <form action=" {{ route('program.delete',$item->id_program) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger" style="height:40px"
                        onclick="return confirm('Apakah Anda yakin ingin menghapus program ini?')">Delete</button>
                    </form>
                    
            </td>
        </tr>
        
        @endforeach
                
    </table>

    <!-- Trigger the modal with a button -->
    <button type="button" class="btn btn-secondary " style="height:40px" data-toggle="modal" data-target="#myModal">
        Add Program
    </button>
    <a  href="{{ route('categories.program') }}" class="btn btn-secondary " style="height:40px">
        Add Categories
    </a>

    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">New Program</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form enctype='multipart/form-data' action="{{ route('program.add') }}" method="POST">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label for="p_name">Nama Program:</label>
                            <input type="text" class="form-control" id="p_name"  name="nama_program" required>
                        </div>
                        <div class="form-group">
                            <label for="p_price">Durasi Program:</label>
                            <input type="time" class="form-control" id="p_price" step="1" name="durasi_program">
                        </div>
                        <div class="form-group">
                            <label for="p_desc">Deskripsi Program:</label>
                            <input type="text" class="form-control" id="p_desc" name="deskripsi" required>
                        </div>
                        <div class="form-group">
                            <label for="p_price">Menit Per Hari:</label>
                            <input type="number" class="form-control" id="p_price" step="1" name="menit_per_hari">
                        </div>
                        <div class="form-group">
                            <label for="categories">Categories:</label>
                            <div class="row">
                              @foreach($cat as $index => $category)
                                <div class="col-md-3"> <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="categories[]" value="{{ $category->id_catProgram }}" id="category_{{ $category->id_catProgram }}">
                                    <label class="form-check-label" for="category_{{ $category->id_catProgram }}">
                                      {{ $category->nama_catProgram }}
                                    </label>
                                  </div>
                                </div>
                        
                                @if (($index + 1) % 4  == 0) <div class="w-100"></div> @endif
                              @endforeach
                            </div>
                          </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-secondary" id="upload" style="height:40px">Add
                                Item</button>
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