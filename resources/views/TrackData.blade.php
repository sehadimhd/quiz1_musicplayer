<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('Plugins/Bootstrap/css/bootstrap.css') }}">
    <title>Data Track</title>
  </head>
  <body>
    @include('Navbar')
    <div class="container my-2">
      <a href="TrackInsert" role="button" class="btn btn-primary">
        +Track
      </a>
      <div class="table-responsive">
    <table class="table table-borderless">
      <thead>
        <th>ID Track</th>
        <th>Nama Artist</th>
        <th>Nama Album</th>
        <th>Pemutar Musik Mini</th>
        <th>Pilihan</th>
      </thead>
      @foreach ($data_track as $row_track)
      <tr>
        <td>
          {{$row_track->track_id}}
        </td>
        <td>
          {{$row_track->artist_name}}
        </td>
        <td>
          {{$row_track->album_name}}
        </td>
        <td>
          <audio class="" src="{{URL::asset('bigdata/data'.$row_track->artist_id.'/'.$row_track->track_name.'.mp3')}}" controls>
          Your browser does not support the audio element.
          </audio>
        </td>
        <td>
          <div class="btn-group">
            <a class="btn btn-primary" href="TrackUpdate/{{$row_track->track_id}}/{{$row_track->artist_id}}/{{$row_track->track_name}}" role="button">Ubah</a>
            <a href="TrackDelete/{{$row_track->track_id}}/{{$row_track->artist_id}}/{{$row_track->track_name}}" class="btn btn-danger" role="button">Hapus</a>
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