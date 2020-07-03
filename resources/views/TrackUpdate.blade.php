<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('Plugins/Bootstrap/css/bootstrap.css') }}">
    <title>Ubah Data Track</title>
  </head>
  <body>
    @include('Navbar')
    <div class="container margin-7">
  <div class="row justify-content-center mt-5">
        <div class="col-md-5">
          <div class="card">
            <div class="card-header bg-transparent mb-0"><h5 class="text-center">Ubah Data Track</h5></div>
            <div class="card-body">
              <form action="/TrackUpdateProcess/<?php echo $data_track[0]->track_id?>/<?php echo $data_track[0]->artist_id?>/<?php echo $data_track[0]->track_name?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
                </div>
                <div class="form-group">
                  Nama Artist - Album<br>
                  <select class="form-control" name="album_id">
                    @foreach($data_album as $row_album)
                    <option value="{{$row_album->album_id}}">{{$row_album->artist_name}} - {{$row_album->album_name}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  Nama Track<br>
                  <input type="text" value="<?php echo $data_track[0]->track_name?>" name="track_name" class="form-control" placeholder="Nama Track" required>
                </div>
                <div class="form-group">
                  File Track<br>
                  <input value="{{URL::asset('bigdata/data'.$data_track[0]->artist_id.'/'.$data_track[0]->track_name.'.mp3')}}" class="form-control" type="file" name="track_file" id="audioselector" required>
                </div>
                <div class="form-group">
                  Pratinjau Musik<br>
                  <audio src="{{URL::asset('bigdata/data'.$data_track[0]->artist_id.'/'.$data_track[0]->track_name.'.mp3')}}" class="form-control" id="audiosrc" controls>
                  Your browser does not support the audio element.
                  </audio>
                </div>
                <div class="form-group">
                  <input type="submit" name="" value="Simpan" class="btn btn-primary btn-block">
                </div>
                <div class="form-group">
                  <a href="/TrackData" class="btn btn-block btn-danger" role="button">Kembali</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
</div>
  </body>
  <script type="text/javascript" src="{{ URL::asset('Plugins/Jquery/Jquery.js') }}"></script>
  <script type="text/javascript" src="{{ URL::asset('Plugins/Popper/Popper.js') }}"></script>
  <script type="text/javascript" src="{{ URL::asset('Plugins/Bootstrap/js/bootstrap.js') }}"></script>
  <script type="text/javascript">

  $('#audioselector').on('change', function()
  {
    var blob = window.URL || window.webkitURL;
    // var file = $('#select').val().split('\\').pop();
    var file = this.files[0], fileURL = blob.createObjectURL(file);
    document.getElementById('audiosrc').src = fileURL;
  }
  );
</script>
</html>