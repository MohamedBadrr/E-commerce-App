
<?php
require_once("../../Models/user.php");
require_once("../../Controllers/AuthController.php");
if(!isset($_SESSION["userId"])){
  session_start();
}
$errMsg="";
if (isset($_POST['userName']) && isset($_POST['password']) && isset($_POST['firstName']) && isset($_POST['lastName'])) 
{
  if (!empty($_POST['userName']) && !empty($_POST['password']) && !empty($_POST['firstName'])  && !empty($_POST['lastName']) ) 
  {
    $user=new User;
    $auth=new AuthController;
    $user->setFirstName($_POST['firstName']);
	$user->setLastName($_POST['lastName']);
    $user->setUserName($_POST['userName']);
    $user->setPassword($_POST['password']);
    if($auth->register($user))
    {
      header("location: ../Client/index.php");
    }
    else
    {
      $errMsg=$_SESSION["errMsg"];
    }

  }
  else
  {
    $errMsg="Please fill all fields";
  }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>

	<title>sign up</title>
	<!-- HTML5 Shim and Respond.js IE11 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 11]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	<!-- Meta -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="description" content="" />
	<meta name="keywords" content="">
	<meta name="author" content="Phoenixcoded" />
	<!-- Favicon icon -->
	<link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">

	<!-- vendor css -->
	<link rel="stylesheet" href="assets/css/style.css">
	
	


</head>

<!-- [ auth-signup ] start -->
<div class="auth-wrapper">
	<div class="auth-content text-center">
		<img src="assets/images/logo.png" alt="" class="img-fluid mb-4">
		<div class="card borderless">
			<div class="row align-items-center text-center">
				<div class="col-md-12">
					<div class="card-body">
						<h4 class="f-w-400">Sign up</h4>
						<h5><br> Enter your information</h5>
						<?php               
                                    if($errMsg!="")
                                    {
                                        ?>
                                        <div class="alert alert-danger" role="alert"><?php echo $errMsg ?></div>
                                        <?php
                                    }
                                
                                ?>
						<hr>
                        <form action="" method="post">
                        <div class="login-form">
                           
						<div class="form-group mb-3">
							<input type="text" class="form-control"name="firstName" placeholder="FirstName">
						</div>
						<div class="form-group mb-3">
							<input type="text" class="form-control"name="lastName" placeholder="LastName">
						</div>
						<div class="form-group mb-3">
							<input type="text" class="form-control"name="userName" placeholder="Username or Email address">
						</div>
						<div class="form-group mb-4">
							<input type="password" class="form-control"name="password" placeholder="Password">
						</div>
						<div class="custom-control custom-checkbox  text-left mb-4 mt-2">
							<input type="checkbox" class="custom-control-input" id="customCheck1">
							<p> <h5><b>Welcome to your website.♥</b></h5>       </p>
						<button class="btn btn-primary btn-block mb-4">Sign up</button>
						
                        </div>
                        </form>
                        <hr>

						<p class="mb-2">Already have an account? <a href="login.php" class="f-w-400">Log in </a></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- [ auth-signup ] end -->

<!-- Required Js -->

<script src="assets/js/plugins/bootstrap.min.js"></script>

<script src="assets/js/pcoded.min.js"></script>



</body>

</html>
