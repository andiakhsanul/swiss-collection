<link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
            integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
@include('admin.component.adminHeader')
@include('admin.component.sidebar')
<div class="container p-5">

    <h4>Add Categories</h4>
   
            <form enctype='multipart/form-data' action="{{ route('categories.program.add') }}" method="POST">
                @method('POST')
                @csrf
                <div class="form-group">
                    <label for="categories">Catgeories Name:</label>
                    <input type="text" class="form-control" id="categories" name="categories">
                </div>
                <button type="submit">Add Categories</button>
             </form>
</div>