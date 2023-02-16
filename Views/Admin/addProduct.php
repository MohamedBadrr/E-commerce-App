<?php

require_once("../../controllers/AuthController.php");
require_once('../../Controllers/productController.php');

$auth = new AuthController;
$auth->checkAdmin();


require_once('../../Controllers/categoryController.php');
require_once('../../Models/product.php');
$categoryController=new categoryController();
$categories = $categoryController->getCategories();
$errMsg="";

$productController=new productController();

if(isset($_POST['name']) && isset($_POST['description']) && isset($_POST['price']) && isset($_FILES["image"] ))  
{
	if(!empty($_POST['name']) && !empty($_POST['description']) && !empty($_POST['price'])  ) 
	{
		$product=new product;
		 $product->setName($_POST['name']);
		 $product->setDescription($_POST['description']);
		 $product->setPrice($_POST['price']);
		 $product->setCategoryid($_POST['category']);
		 //$product->setImage($_POST['price']);

		  

		 $location = "../images/" . date("h-i-s") . $_FILES["image"]["name"];
		 $product->setImage($location);

		 if (move_uploaded_file($_FILES["image"]["tmp_name"], $location)) {
			 $product->setImage($location); 
			 if ($productController->addProduct($product)) {
				 header("location: index.php");
			 } else {
				 $errMsg = "Something went wrong... try again";
			 }
		 } else {
			 $errMsg = "Error in Upload";
		 }
	 } else {
		 $errMsg = "Please fill all fields";
	 }
 }


 
 


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <title>Flat Able - Premium Admin Template by Phoenixcoded</title>
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
<body class="">
	<!-- [ Pre-loader ] start -->
	<div class="loader-bg">
		<div class="loader-track">
			<div class="loader-fill"></div>
		</div>
	</div>
	<!-- [ Pre-loader ] End -->
	<!-- [ navigation menu ] start -->
	<nav class="pcoded-navbar  ">
		<div class="navbar-wrapper  ">
			<div class="navbar-content scroll-div " >
				
				
				
				<ul class="nav pcoded-inner-navbar ">
					<li class="nav-item pcoded-menu-caption">
						
					</li>
					
					
				
					
					<li class="nav-item">
					    <a href="index.php" class="nav-link "><span class="pcoded-micon"><i class="feather icon-align-justify"></i></span><span class="pcoded-mtext">Admin Home Page</span></a>
					</li>
					

				</ul>
				
				
				
			</div>
		</div>
	</nav>
	<!-- [ navigation menu ] end -->
	<!-- [ Header ] start -->
	<header class="navbar pcoded-header navbar-expand-lg navbar-light header-dark">
		
			
				<div class="m-header">
					<a class="mobile-menu" id="mobile-collapse" href="#!"><span></span></a>
					<a href="#!" class="b-brand">
						<!-- ========   change your logo hear   ============ -->
						<img src="assets/images/logo.png" alt="" class="logo">
						<img src="assets/images/logo-icon.png" alt="" class="logo-thumb">
					</a>
					<a href="#!" class="mob-toggler">
						<i class="feather icon-more-vertical"></i>
					</a>
				</div>
				<div class="collapse navbar-collapse">
					<ul class="navbar-nav mr-auto">
						<li class="nav-item">
							<a href="#!" class="pop-search"><i class="feather icon-search"></i></a>
							<div class="search-bar">
								<input type="text" class="form-control border-0 shadow-none" placeholder="Search hear">
								<button type="button" class="close" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
						</li>
						<li class="nav-item">
							
						</li>
						<li class="nav-item">
							
								<div class="dropdown-menu profile-notification ">
									<div class="row no-gutters">
										
										
									
									
									</div>
								</div>
							</div>
						</li>
					</ul>
					<ul class="navbar-nav ml-auto">
						<li>
							<div class="dropdown">
								<a class="dropdown-toggle" href="#" data-toggle="dropdown">
									
								</a>
								
							</div>
						</li>
						<li>
							<div class="dropdown drp-user">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
									<i class="feather icon-user"></i>
								</a>
								<div class="dropdown-menu dropdown-menu-right profile-notification">
									<div class="pro-head">
										<img src="assets/images/user/avatar-1.jpg" class="img-radius" alt="User-Profile-Image">
										<span>John Doe</span>
										<a href="auth-signin.html" class="dud-logout" title="Logout">
											<i class="feather icon-log-out"></i>
										</a>
									</div>
								
								</div>
							</div>
						</li>
					</ul>
				</div>
				
			
	</header>
	<!-- [ Header ] end -->
	
	

<!-- [ Main Content ] start -->
<section class="pcoded-main-container">
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10"><h4>Add New Products</h4></h5><br>
                    
                </div>
            </div>
        </div>
     
            <!-- [ form-element ] start -->
            <div class="col-sm-12">
                <div class="card">
             
                    <div class="card-body">
                        <h5>Product Details</h5>
						 <!-- error message -->
						 <?php               
                                    if($errMsg!="")
                                    {
                                        ?>
                                        <div class="alert alert-danger" role="alert"><?php echo $errMsg ?></div>
                                        <?php
                                    }
                                
                                ?>

                        <hr>
                        <div class="row">
                            <div class="col-md-6">
							<form action="" method="post" enctype="multipart/form-data" class="form-horizontal">

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Product Name</label>
                                        <input type="text" class="form-control" name="name" placeholder="Enter Name">
                                        
                                    </div>
                                    <!-- <div class="form-group">
                                        <label for="exampleInputPassword1">Product Description</label>
                                        <input type="text" class="form-control" name="description" placeholder="Description">
                                    </div> -->
									<div class="form-group">
                                        <label for="exampleFormControlTextarea1">Product Description</label>
                                        <textarea class="form-control" name="description" rows="3"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Product price</label>
                                        <input type="text" class="form-control" name="price"  placeholder="Enter price">
                                        
                                    </div>
									<div class="col col-md-3">
                                                    <label for="file-input" class=" form-control-label">Image</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="file" id="file-input" name="image" class="form-control-file">
                                                </div>
                                    <div class="form-group">
										<br>
                                        <label for="exampleFormControlSelect1">Category</label>
                                        <select class="form-control" name="category">

										 <?php	
												foreach($categories as $category)
												{?>
													<option value="<?php echo $category["id"] ?>"><?php echo $category["name"] ?></option> 
 
												<?php
//الفاليو اللي انت عايز تحطها انهي فاليو من الكاتيجوري و النيم هتبقي انهي فاريبول  
												}
											?>
                                            
                                            
                                        </select>
                                    </div>
									
                                    
									
									<button type="submit" class="btn  btn-primary">Submit</button>

								
                                </form>
                         
                            </div>
                        </div>
<!-- [ Main Content ] end -->
    <!-- Warning Section start -->
    <!-- Older IE warning message -->
    <!--[if lt IE 11]>
        <div class="ie-warning">
            <h1>Warning!!</h1>
            <p>You are using an outdated version of Internet Explorer, please upgrade
               <br/>to any of the following web browsers to access this website.
            </p>
            <div class="iew-container">
                <ul class="iew-download">
                    <li>
                        <a href="http://www.google.com/chrome/">
                            <img src="assets/images/browser/chrome.png" alt="Chrome">
                            <div>Chrome</div>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.mozilla.org/en-US/firefox/new/">
                            <img src="assets/images/browser/firefox.png" alt="Firefox">
                            <div>Firefox</div>
                        </a>
                    </li>
                    <li>
                        <a href="http://www.opera.com">
                            <img src="assets/images/browser/opera.png" alt="Opera">
                            <div>Opera</div>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.apple.com/safari/">
                            <img src="assets/images/browser/safari.png" alt="Safari">
                            <div>Safari</div>
                        </a>
                    </li>
                    <li>
                        <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                            <img src="assets/images/browser/ie.png" alt="">
                            <div>IE (11 & above)</div>
                        </a>
                    </li>
                </ul>
            </div>
            <p>Sorry for the inconvenience!</p>
        </div>
    <![endif]-->
    <!-- Warning Section Ends -->

    <!-- Required Js -->
    <script src="assets/js/vendor-all.min.js"></script>
    <script src="assets/js/plugins/bootstrap.min.js"></script>
    <script src="assets/js/pcoded.min.js"></script>



</body>
</html>
