<link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
            integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
@include('admin.component.adminHeader')
@include('admin.component.sidebar')
<div class="container p-5">

    <h4>Edit User</h4>
   
            <form id="update-Items" enctype='multipart/form-data' action="{{ route('updateUser', $user->id) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="first_name">First Name:</label>
                    <input type="text" class="form-control" id="first_name" name="first_name" value="{{ $user->first_name }}">
                </div>
                <div class="form-group">
                    <label for="last_name">Last Name:</label>
                    <input type="text" class="form-control" id="last_name" name="last_name" value="{{ $user->last_name }}">
                </div>
                <div class="form-group">
                    <label for="email">Email :</label>
                    <input type="text" class="form-control" id="email" name="email" value="{{ $user->email }}">
                </div>
                <div class="form-group">
                    <label for="password">Password :</label>
                    <input type="text" class="form-control" id="password" name="password" value="">
                </div>
                <div class="form-group">
                    <label for="isAdmin">Role :</label>
                    <select class="form-control @error('role') is-invalid @enderror" id="isAdmin" name="isAdmin">
                        <option value="">Select Role</option>
                        <option value="1" {{ $user->isAdmin == '1' ? 'selected' : '' }}>Admin</option>
                        <option value="0" {{ $user->isAdmin == '0' ? 'selected' : '' }}>User</option>
                    </select>
                </div>
                <button type="submit">Update Profile</button>
             </form>
</div>