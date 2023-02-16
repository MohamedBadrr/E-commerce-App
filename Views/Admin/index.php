<?php

require_once("../../controllers/AuthController.php");
require_once('../../Models/product.php');
$auth = new AuthController;
$auth->checkAdmin();

require_once('../../Controllers/categoryController.php');
$categoryController=new categoryController;
$categories = $categoryController->getCategories();


require_once('../../Controllers/keywordController.php');
$keywordController=new keywordController;
$keywords = $keywordController->getkeywords();

require_once('../../Controllers/productController.php');
$productController=new productController;
$products = $productController->getAllProducts();



require_once('../../Controllers/categoryController.php');

$deleteMsg = false;
if (isset($_POST["delete"])) {
  if (!empty($_POST["productId"])) {
    if ($productController->deleteProduct($_POST["productId"])) {
      $deleteMsg = true;
      $products = $productController->getAllProducts();
    }
  }
}

require_once('../../Controllers/categoryController.php');
$categoryController=new categoryController;


if (isset($_POST["deleteCat"])) {
	if (!empty($_POST["categoryId"])) {
	  if ($categoryController->deleteCategory($_POST["categoryId"])) {
		$deleteMsg = true;
		$categories = $categoryController->getCategories();
	  }
	}
  }
  require_once('../../Controllers/keywordController.php');
  $keywordController=new keywordController;


  if (isset($_POST["deleteKey"])) {
	if (!empty($_POST["keywordId"])) {
	  if ($keywordController->deleteKeyword($_POST["keywordId"])) {
		$deleteMsg = true;
		$keywords = $keywordController->getkeywords();
	  }
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
					    <a href="" class="nav-link "><span class="pcoded-micon"><i class="feather icon-align-justify"></i></span><span class="pcoded-mtext">Admin Home Page</span></a>
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
							<div class="dropdown">
								
								<div class="dropdown-menu profile-notification ">
								
								</div>
							</div>
						</li>
						<li class="nav-item">
							<div class="dropdown mega-menu">
								
								<div class="dropdown-menu profile-notification ">
									<div class="row no-gutters">
									
									</div>
								</div>
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
										<span><?php echo$_SESSION["userName"] ?></span><br><br>
										<p><?php echo$_SESSION["userRole"] ?></p>
										<a href="../Auth/login.php?logout" class="dud-logout" title="Logout">
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
                            
					
					<br><br><h3><a href="../Client/index.php">Products</a></h3><br>
					
                </div>
            </div>
			<?php
              if (count($products) == 0) {
				?>
				<div class="alert alert-danger" role="alert">No Available Products</div>
			
              
			
              <?php
			  }
             else{
				?>
				
				<div class="col-xl-12">
					<div class="card">
						
				<div class="card-body table-border-style">
				<div class="table-responsive">
					<table class="table table-striped">
						<thead>
							<tr>
								<th>#</th>
								<th>Product Name</th>
								<th>Category</th>
								<th>Price</th>
								<th>rate</th>
								<th>Delet</th>
							</tr>
						</thead>
				
				<?php
				  foreach ($products as $product)
				  {

					?>
	
									<tbody>
										<tr>
										<td> <?php echo $product["id"] ?> </td>
											<td> <?php echo $product["name"] ?> </td>
											<td><?php echo $product["category"] ?></td>
											<td><?php echo $product["price"] ?></td>
											<td><?php echo $product["rate"] ?></td>

										
											<td><form action="index.php" method="POST">
                              <input type="hidden" name="productId" value="<?php echo $product["id"] ?>">
							  <button type="submit" name="delete" class="btn  btn-info">Delete</button>
                              </button>
                            </form>
										
										</td>
										</tr>
									   
								
					<?php

				  }

			  }

              ?>
			  	</tbody>
								</table>
								</div>
						</div>
						</div>

 		
           

           



<a href="addProduct.php" class ="col-md-3 btn btn-primary float-end">
							<span class="tf-icons bx bx-add-to-queue"></span>Add New Product </a>
							<br><br><br><hr>
			  
        </div>

  
 
                    </div>
					</div>
							
					     
					
						</div>
				
				<div class="card-body table-border-style">
				<div class="table-responsive">
				<h4>Categories :</h4><br><br>
					<table class="table table-striped">
						
					<thead>
							<tr>
								<th> ID </th>
								<th>category</th>
								<th>Delete</th>
								
							</tr>
						</thead>
						<?php
							foreach ($categories as $category){

							?>
						
						<tbody>
						<tr>
                             <td><?php echo $category["id"] ?></td>
                            <td><?php echo $category["name"] ?></td> 
							<td>
						  <form action="index.php" method="POST">
                              <input type="hidden" name="categoryId" value="<?php echo $category["id"] ?>">
							  <button type="submit" name="deleteCat" class="btn  btn-info">Delete</button>
                              </button>
                            </form>
                                      
                            </td>          
                            </tr>
							
							
								
							
						<?php

}						
						?>


                         
 
						</tbody>
                            </table>
					</table>
					</div>
					<div>
					<a href="addCategory.php" class ="col-md-3 btn btn-primary float-end">
							<span class="tf-icons bx bx-add-to-queue"></span>Add Category</a>
                        </div>
							<br><hr>
					<div>
					
						<div class="card-body table-border-style">
                        <div class="table-responsive">
							<br><h4>Key words : </h4><br>
							</div>
					<a href="addKeyword.php" class ="col-md-3 btn btn-primary float-end">
							<span class="tf-icons bx bx-add-to-queue"></span>Add New  keyword </a>
					

                        </div>
						<table class="table table-striped">
					<thead>
							<tr>
								<th>Number</th>
								<th>keyword</th>
								<th>Actions</th>
								
							</tr>
						</thead>
						<?php
							foreach ($keywords as $keyword){

							?>
						
						<tbody>
						<tr>
                             <td><?php echo $keyword["id"] ?></td>
                            <td><?php echo $keyword["word"] ?></td> 
							<td>
							  <form action="index.php" method="POST">
                              <input type="hidden" name="keywordId" value="<?php echo $keyword["id"] ?>">
							  <button type="submit" name="deleteKey" class="btn  btn-info">Delete</button>
                              </button>
                            </form></td>          
                            </tr>
							
								
							
						<?php

}						
						?>
						</tbody>
                            </table>
					</table>
					</div>


                  
				
				</div>
	
            </div>




		
			
            <!-- [ stiped-table ] end -->
            <!-- [ Contextual-table ] start -->
            </section>
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
