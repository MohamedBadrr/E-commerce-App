

<?php

require_once("../../controllers/AuthController.php");

$auth = new AuthController;
$auth->checkClient();


require_once('../../Controllers/categoryController.php');
$categoryController=new categoryController;
$categories = $categoryController->getCategories();
require_once('../../Controllers/productController.php');
$productController=new productController;
require_once('../../Controllers/commentContriller.php');
$CommentController = new CommentController;
//$productController = new ProductController;
//$rateController = new rateController;
if(isset($_GET["id"])){
    if(!empty($_GET["id"])){
        $products = $productController->getProductDetails($_GET["id"]);
        $_SESSION["productId"] = $_GET["id"] ;
       $comments = $CommentController->getComments($_GET["id"]);
        //$rateController->getProductRate($_GET["id"]);

    }else{
        header("location: index.php");
    }
}else{
    header("location: index.php");
}

if(isset($_POST["comment"])){
    if(!empty($_POST["comment"])){
        $comment = new comment;
        $comment->setContent($_POST["comment"]);
        $comment->setProductId($_GET["id"]);
        $comment->setUserId($_SESSION["userId"]);
        $CommentController->addComment($comment);
       // $rateController->getProductRate($_GET["id"]);
        header("location: productDetails.php");
        
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>E_Store</title>
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
						<!-- <label>UI Element</label> -->
					</li>
					<li class="nav-item pcoded-hasmenu">
						<a href="#!" class="nav-link "><span class="pcoded-micon"><i class="feather icon-box"></i></span><span class="pcoded-mtext">Categories</span></a>
						<ul class="pcoded-submenu">


						<?php
							foreach ($categories as $category){
						?>
                  
							<li><a href="category.php?id=<?php echo $category["id"] ?>"><?php echo $category["name"] ?></a></li>
							 
						<?php

}						
						?>
	
						</ul>
					
					   
					
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
						
						
					</ul>

									
						
							<div class="dropdown drp-user">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
									<i class="feather icon-user"></i>
								</a>
								<div class="dropdown-menu dropdown-menu-right profile-notification">
									<div class="pro-head">
										<img src="assets/images/user/avatar-1.jpg" class="img-radius" alt="User-Profile-Image">
										<span><?php
										 echo $_SESSION["userName"] ?>  <br> </span> <br>
										 <p><?php
										  echo $_SESSION["userRole"]?></p>
										 	
										  
										<a href="../Auth/login.php?logout" class="dud-logout" title="Logout">
											<i class="feather icon-log-out"></i>
										</a>
									
							</div>
						</li>
					</ul>
				</div>
				
			
	</header>
	<!-- [ Header ] end -->
	
	

<!-- [ Main Content ] start -->
<div class="pcoded-main-container">
	<div class="pcoded-content">
		<!-- [ breadcrumb ] start -->
		<div class="page-header">
			<div class="page-block">
				<div class="row align-items-center">
					<div class="col-md-12">
						<div  class="page-header-title">
					
				</div>
			</div>
		</div>
      
		<!-- [ breadcrumb ] end -->
		<!-- [ Main Content ] start -->

    <!-- <div class="typo-articles">
                                    <h4>Product Details of  <u><?php //echo  $product['name'] ?> </u>  </h4><br>
                                    <img class="card-img-top" src="" alt="Card image cap" style="width:50%; text-align:center;">
                                    <p class="card-text"><?php// echo 'Price : '. $product['price'] .' EGP'?></p>
                                    <p class="card-text"><?php// echo 'Rate : '. $product['rate'] ?> / 100 </p>
                                    <p class="card-text"><?php //echo 'details : '. $product['information'] ?></p>
                                    <br>
                                    <div class="row m-t-30"> -->

	
        <!-- <div class="card-body"> -->
       
                  <?php
                    foreach  ($products as $product) 
                    ?>
                    

                                <div stile="500px">
                                    <p>
                                       
                                    <img src="<?php echo $product['image'] ?>" alt="lions" width ="49%" height="60%" align="right"/>
                                    <br>
                                     <h2><?php echo  $product['name']?></h2>
                                     <br>
                                     <b> <u>Price</u> :  </b>
                                     <b><?php echo " ".  $product['price'] .' EGP'?></b></p>
                                     <b><u>Rate</u> :  </b>
                                     <b><?php echo " ".  "Will Be Calculated Soon ."?></b></p>
                                  
                                     <b><h5><u>Details</u>:</h5> <?php echo  $product['information'] . " ."?></p></p>
                                     <h5>Add Comment :</h5>
                                     <div class="card-body card-block" style="width : 35% ; height : 35% ;"  > 
                                    <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                                            <div class="row form-group">
                                                <div class="col col-md-3">

                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <textarea name="comment" id="textarea-input" rows="9" placeholder="Content..." class="form-control"></textarea>
                                                </div>
                                                <button type="submit" class="btn btn-primary btn-sm">
                                            <i class="fa fa-dot-circle-o"></i> Add
                                        </button>
                                            </div>
                                            <div class="card-footer">
                                        
                                       
                                    </div>
                                        </form>
                    </div>
                                </div>

                            <div class="col-md-12">
                              
                                 <div class="table-responsive m-b-40">
                                    <table class="table table-borderless table-data3" style="width:60%; " >

                                    <h4> <b>All Comments :</b> </h4><br>
                                        <thead>
                                         
                                        </thead>
                                         <tbody>
                                            
                                                <?php
                                                 foreach ($comments as $comment) {
                                                    
                                                  
                                                 ?>
                                                     
                                                  <b><u>Owner The Comment</u> :</b>   <?php ?> <?php echo "(".$comment["firstName"] ." ".$comment["lastName"] .")  "?><br>
                                                  <b><u>Comment</u> :</b> <?php echo " ' " . $comment["content"] . " .' "?> <br><br>
                                                </td>
                                                     </tr>
                                                <?php
                                               // }
                                                ?>
                                            
                                            
                                        </tbody>  

                                  
                    </div>
                                
                                
                                <!-- END DATA TABLE-->
                            </div>
                        </div>
                        
                        </div>
                                    
                    </div>          
                    <?php
                    }

                    ?>



                    <!-- add comment-->
                    
                  
                  </div>
                </div>
                



              </div>
            </div>
          </div>
        </div>
      </div>
            <!-- END COPYRIGHT-->
        </div>

    </div>


					
				</div>
			</div>
			
		</div>
	
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
