<?php
include 'Configs/connection.php';
include 'Configs/login_session_checker.php';
if(isset($_SESSION['login_message']))
{
  $login_message = $_SESSION['login_message'];
  unset($_SESSION['login_message']);
}
else
{
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
  <meta lang="en">
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" type="text/css" href="Assets/CSS/default.css">
  <link rel="stylesheet" type="text/css" href="Plugins/bootstrap-4.5.0-dist/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="Plugins/fontawesome-free-5.13.0-web/css/all.css">
</head>
<body>
<div class="container">
      <div class="row justify-content-center mt-5">
        <div class="col-md-4">
          <div class="card">
            <div class="card-header bg-transparent mb-0"><h5 class="text-center">Please <span class="font-weight-bold text-primary">LOGIN</span></h5></div>
            <div class="card-body">
              <form action="login_process.php" method="post">
                <div class="form-group">
                  <div class="alert alert-danger" id="login_alert_message">
                    <?php
                      if(isset($login_message))
                      {
                        echo $login_message;
                      }
                      else
                      {

                      }
                    ?>
                  </div>
                </div>
                <div class="form-group">
                  <input type="text" name="txt_username" class="form-control" placeholder="Username" required>
                </div>
                <div class="form-group">
                  <input type="password" name="txt_password" class="form-control" placeholder="Password" required id="txt_password">
                </div>
                <div class="form-group custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="cbx_show_password">
                  <label class="custom-control-label" for="cbx_show_password">Show Password</label>
                </div>
                <div class="form-group custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="cbx_remember_me">
                  <label class="custom-control-label" for="cbx_remember_me">Remember Me</label>
                </div>
                <div class="form-group">
                  <input type="submit" name="" value="Login" class="btn btn-primary btn-block">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
</body>
<script type="text/javascript" src="Plugins/Jquery/Jquery.js"></script>
<script type="text/javascript" src="Plugins/PopperJS/popperJS.js"></script>
<script type="text/javascript" src="Plugins/bootstrap-4.5.0-dist/js/bootstrap.js"></script>
<script type="text/javascript" src="Plugins/fontawesome-free-5.13.0-web/js/all.js"></script>
<script type="text/javascript">
	$(window).on('load', function()
	{
	}
	);

  $('#cbx_show_password').on('click change', function()
  {
    if($('#cbx_show_password').not(':checked'))
    {

      $('#txt_password').attr('type', 'password');
    }
    if($('#cbx_show_password').is(':checked'))
    {
      $('#txt_password').attr('type', 'text');
    }
  });

  function isEmpty( el ){
      return !$.trim(el.html())
  }
  if (isEmpty($('#login_alert_message'))) {
      $('#login_alert_message').remove();
  }
</script>
<?php
?>
</html>