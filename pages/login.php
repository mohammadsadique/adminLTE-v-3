<?php require('../setting/setPage.php'); ?>
<?php 
	if(isset($_POST['signin']))
	{
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		$query_ad1 = "SELECT * FROM `login` WHERE username = '$username' AND  password = '$password' ";
		$run_ad1 = mysqli_query($conn,$query_ad1);
		$get1 = mysqli_fetch_assoc($run_ad1);
		$num_ad1 = mysqli_num_rows($run_ad1);
					
		$_SESSION['id']= $get1['id'];
		if($num_ad1 > '0')
		{
			echo "<script>window.location.href='dashboard/dashboard.php'</script>";
		}else{
	        echo "<script>alert('Wrong username or password! Retry');</script>";
		}
	}	
?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Superadmin</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo url(); ?>/<?php echo $rootname; ?>plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo url(); ?>/<?php echo $rootname; ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo url(); ?>/<?php echo $rootname; ?>dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href=""><b>Super</b>ADMIN</a>
  </div>
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="" method="post">
        <div class="input-group mb-3">
          <input type="text" name="username" class="form-control" placeholder="Username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8"></div>
          <div class="col-4">
            <button type="submit" name="signin" class="btn btn-primary btn-block">Sign In</button>
          </div>
        </div>
      </form>
  </div>
</div>

<!-- jQuery -->
<script src="<?php echo url(); ?>/<?php echo $rootname; ?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo url(); ?>/<?php echo $rootname; ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo url(); ?>/<?php echo $rootname; ?>dist/js/adminlte.min.js"></script>

</body>
</html>
