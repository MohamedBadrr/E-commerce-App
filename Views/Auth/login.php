<?php
$errMsg="";
require_once("../../Models/user.php");
require_once("../../Controllers/AuthController.php");
if(isset($_GET["logout"]))
{
  session_start();
  session_destroy();
}
if(isset($_POST['userName']) && isset($_POST['password']))
{
    if(!empty($_POST['userName']) && !empty($_POST['password']) )
    {   
        $user=new User;
        $auth=new AuthController;
        $user->setUsername( $_POST['userName']);
        $user->setPassword( $_POST['password']);
        if(!$auth->login($user))
        {
            if(!isset($_SESSION["userId"]))
            {
               // session_start();
            }
            $errMsg=$_SESSION["errMsg"];
        }
        else
        {
            if(!isset($_SESSION["userId"]))
            {
                session_start();
            }
            if($_SESSION["userRole"]=="Admin")
            {
                header("location: ../Admin/index.php");
            }
            else
            {
                header("location: ../Client/index.php");
            }

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

	<title>log in</title>
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

<!-- [ auth-signin ] start -->
<div class="auth-wrapper">
	<div class="auth-content text-center">
		<img src="assets/images/logo.png" alt="" class="img-fluid mb-4">
		<div class="card borderless">
			<div class="row align-items-center ">
				<div class="col-md-12">
					<div class="card-body">
						<h4 class="mb-3 f-w-400">Log in</h4>
						<hr>
						<b><p> <h5> Hey , Welcome back</h5></p></b>
						 <!-- error message -->
						 <?php               
                                    if($errMsg!="")
                                    {
                                        ?>
                                        <div class="alert alert-danger" role="alert"><?php echo $errMsg ?></div>
                                        <?php
                                    }
                                
                                ?>

						<form action="" method="post">
						<div class="form-group mb-3">
						
							<input type="text" class="form-control" name="userName" placeholder="Username or Email address">
						</div>
						<div class="form-group mb-4">
					
							<input type="password" class="form-control" name="password" placeholder="Password">
						</div>
						<div class="custom-control custom-checkbox text-left mb-4 mt-2">
							<input type="checkbox" class="custom-control-input" id="customCheck1">
							<label class="custom-control-label" for="customCheck1">Save credentials.</label>
						</div>
						<button class="btn btn-block btn-primary mb-4">Log in</button>
						</form>
						<hr>
						
						<p class="mb-0 text-muted">Don’t have an account? <a href="register.php" class="f-w-400">Signup</a></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- [ auth-signin ] end -->

<!-- Required Js -->

<script src="assets/js/plugins/bootstrap.min.js"></script>

<script src="assets/js/pcoded.min.js"></script>



</body>

</html>
