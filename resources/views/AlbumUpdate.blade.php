<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('Plugins/Bootstrap/css/bootstrap.css') }}">
    <title>Ubah Data Album</title>
  </head>
  <body>
    @include('Navbar')
    <div class="container margin-7">
  <div class="row justify-content-center mt-5">
        <div class="col-md-5">
          <div class="card">
            <div class="card-header bg-transparent mb-0"><h5 class="text-center">Ubah Data Album</h5></div>
            <div class="card-body">
              <form action="/AlbumUpdateProcess/<?php echo $data_album[0]->album_id?>" method="post">
                <div class="form-group">
                  <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
                </div>
                <div class="form-group">
                  Nama Artist<br>
                  <select class="form-control" name="artist_id">
                    @foreach($data_artist as $row_artist)
                    @if($row_artist->artist_id==$data_album[0]->artist_id)
                    <option selected value="{{$row_artist->artist_id}}">{{$row_artist->artist_name}}</option>
                    @else
                    <option value="{{$row_artist->artist_id}}">{{$row_artist->artist_name}}</option>
                    @endif
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  Nama Album<br>
                  <input type="text" value="<?php echo $data_album[0]->album_name;?>" name="album_name" class="form-control" placeholder="Nama Album" required>
                </div>
                <div class="form-group">
                  <input type="submit" name="" value="Simpan" class="btn btn-primary btn-block">
                </div>
                <div class="form-group">
                  <a href="/AlbumData" class="btn btn-block btn-danger" role="button">Kembali</a>
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
</html>