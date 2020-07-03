<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('Plugins/Bootstrap/css/bootstrap.css') }}">
    <title>Data Album</title>
  </head>
  <body>
    @include('Navbar')
    <div class="container my-2">
      <a href="AlbumInsert" role="button" class="btn btn-primary">
        +Album
      </a>
      <div class="table-responsive">
    <table class="table table-borderless">
      <thead>
        <th>ID Album</th>
        <th>Nama Artist</th>
        <th>Nama Album</th>
        <th>Pilihan</th>
      </thead>
      @foreach ($data_album as $row_album)
      <tr>
        <td>
          {{$row_album->album_id}}
        </td>
        <td>
          {{$row_album->artist_name}}
        </td>
        <td>
          {{$row_album->album_name}}
        </td>
        <td>
          <div class="btn-group">
            <a class="btn btn-primary" href="AlbumUpdate/{{$row_album->album_id}}" role="button">Ubah</a>
            <a href="AlbumDelete/{{$row_album->album_id}}" class="btn btn-danger" role="button">Hapus</a>
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