<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('Plugins/Bootstrap/css/bootstrap.css') }}">
    <title>Data Artist</title>
  </head>
  <body>
    @include('Navbar')
    <div class="container my-2">
      <a href="ArtistInsert" role="button" class="btn btn-primary">
        +Artist
      </a>
      <div class="table-responsive">
    <table class="table table-borderless">
      <thead>
        <th>ID Artist</th>
        <th>Nama Artist</th>
        <th>Pilihan</th>
      </thead>
      @foreach ($data_artist as $row_artist)
      <tr>
        <td>
          {{$row_artist->artist_id}}
        </td>
        <td>
          {{$row_artist->artist_name}}
        </td>
        <td>
          <div class="btn-group">
            <a class="btn btn-primary" href="ArtistUpdate/{{$row_artist->artist_id}}" role="button">Ubah</a>
            <a href="ArtistDelete/{{$row_artist->artist_id}}" class="btn btn-danger" role="button">Hapus</a>
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