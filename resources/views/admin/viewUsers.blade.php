
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
            integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<body>
@include('admin.component.adminHeader')
@include('admin.component.sidebar')
  <div>
    <h2>All Users</h2>
    <table class="table ">
      <thead>
        <tr>
          <th class="text-center">ID</th>
          <th class="text-center">Nama Pengguna </th>
          <th class="text-center">Email</th>
          <th class="text-center">Password</th>
          <th class="text-center">Role</th>
          <th class="text-center" >Action</th>
        </tr>
      </thead>
      @foreach ($users as $item)
      <tr>
        <td>
          {{ $item->id }}
        </td>
        <td>
          {{ $item->full_name }}
        </td>
        <td>
          {{ $item->email }}
        </td>
        <td>
          {{ $item->password }}
        </td>
        <td>
          @if ( $item->isAdmin  == 1)
            Admin
          @else
            User
          @endif
        </td>
        <td>
          <a href="{{ route('editUser', $item->id) }}" class="btn btn-primary  "> Edit</a>
          <form action="{{ route('deleteUser', $item->id) }}" method="POST" class="pt-2">
              @method('DELETE')
              @csrf
              <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus user ini?')"> Delete</button>
          </form>
          
        </td>
      </tr>
      @endforeach
    </table>
  </div>
</body>
