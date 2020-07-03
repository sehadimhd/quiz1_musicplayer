<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('Plugins/Bootstrap/css/bootstrap.css') }}">
    <title>Data User</title>
  </head>
  <body>
    @include('Navbar')
    <div class="container my-2">
      <a href="UserInsert" role="button" class="btn btn-primary">
        +User
      </a>
      <div class="table-responsive">
    <table class="table table-borderless">
      <thead>
        <th>ID User</th>
        <th>Username</th>
        <th>Password</th>
        <th>Nickname</th>
        <th>Pilihan</th>
      </thead>
      @foreach ($data_user as $row_user)
      <tr>
        <td>
          {{$row_user->user_id}}
        </td>
        <td>
          {{$row_user->user_username}}
        </td>
        <td>
          {{$row_user->user_password}}
        </td>
        <td>
          {{$row_user->user_nickname}}
        </td>
        <td>
          <div class="btn-group">
            <a class="btn btn-primary" href="UserUpdate/{{$row_user->user_id}}" role="button">Ubah</a>
            <a href="UserDelete/{{$row_user->user_id}}" class="btn btn-danger" role="button">Hapus</a>
          </div>
        </td>
      </tr>
      @endforeach
    </table>
    </div>
  </div>
  </body>
  <script type="text/javascript" src="{{ URL::asset('Plugins/Jquery/Jquery.js') }}"></script>
  <script type="text/javascript" src="{{ URL::asset('Plugins/Popper/Popper.js') }}"></script>
  <script type="text/javascript" src="{{ URL::asset('Plugins/Bootstrap/js/bootstrap.js') }}"></script>
</html>