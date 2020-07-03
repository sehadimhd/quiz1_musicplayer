<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('Plugins/Bootstrap/css/bootstrap.css') }}">
    <title>Ubah Data User</title>
  </head>
  <body>
    @include('Navbar')
    <div class="container margin-7">
  <div class="row justify-content-center mt-5">
        <div class="col-md-5">
          <div class="card">
            <div class="card-header bg-transparent mb-0"><h5 class="text-center">Ubah Data User</h5></div>
            <div class="card-body">
              <form action="/UserUpdateProcess/<?php echo $data_user[0]->user_id?>" method="post">
                <div class="form-group">
                  <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
                </div>
                <div class="form-group">
                  Username<br>
                  <input type="text" value="<?php echo $data_user[0]->user_username?>" name="user_username" class="form-control" placeholder="Username" required>
                </div>
                <div class="form-group">
                  Password<br>
                  <input value="<?php echo $data_user[0]->user_password?>" type="text" name="user_password" class="form-control" placeholder="Password" required>
                </div>
                <div class="form-group">
                  Nickname<br>
                  <input type="text" value="<?php echo $data_user[0]->user_nickname?>" name="user_nickname" class="form-control" placeholder="Nama User" required>
                </div>
                <div class="form-group">
                  <input type="submit" name="" value="Simpan" class="btn btn-primary btn-block">
                </div>
                <div class="form-group">
                  <a href="/ArtistData" class="btn btn-block btn-danger" role="button">Kembali</a>
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