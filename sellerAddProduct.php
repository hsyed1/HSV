<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Shop Cart</title>

    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="bootstrap/css/mystyles.css" rel="stylesheet">
	
	<link href='http://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100' rel='stylesheet' type='text/css'>

    <!-- styles -->
    <link href="bootstrap/css/templatecss/font-awesome.css" rel="stylesheet">
    <link href="bootstrap/css/templatecss/animate.min.css" rel="stylesheet">
    <link href="bootstrap/css/templatecss/owl.carousel.css" rel="stylesheet">
    <link href="bootstrap/css/templatecss/owl.theme.css" rel="stylesheet">

    <!-- theme stylesheet -->
    <link href="bootstrap/css/templatecss/style.default.css" rel="stylesheet" id="theme-stylesheet">

    <!-- your stylesheet with modifications -->
    <link href="bootstrap/css/templatecss/custom.css" rel="stylesheet">

    <!-- <script src="js/respond.min.js"></script> -->

    <link rel="shortcut icon" href="favicon.png">


  </head>
  
  <body>
	<?php include 'header.php';?>
	
	
	
	<div class="container">
	<div class="row">
		<div class="box">
					
					  <h1 class="text-primary text-center">Add New Product</h1>
					  <hr>	
					  <form action="addProduct.php" method="post">
						  
						  <div class="form-group">
							<label for="pName">
							  Product Name
							</label>
							<input type="text"  class="form-control" name="productName" autocomplete="off" id="pName"/>
						  </div>
							  
						  <div class="form-group">
							<label for="descLong">
							  Long Description
							</label>
							<input type="text" class="form-control" name="descLong" autocomplete="off" id="descLong"/>
						  </div>
						  
						  <div class="form-group">
							<label for="descShort">
							  Short Description
							</label>
							<input type="text" class="form-control" name="descShort" autocomplete="off" id="descShort"/>
						  </div>
						  
						  <div class="form-group">
							<label for="price">
							  Price
							</label>
							<input type="text" class="form-control" name="price" autocomplete="off" id="price"/>
						  </div>
						  
						  <div class="form-group">
							<label for="quantity">
							  Quantity
							</label>
							<input type="text" class="form-control" name="quantity" autocomplete="off" id="quantity"/>
						  </div>
						  
						  <div class="form-group">
							<label for="imageMain">
							  Main Image
							</label>
							<input type="text" class="form-control" name="imageMain" autocomplete="off" id="imageMain"/>
						  </div>
						  
						  <div class="form-group">
							<label for="subImg1">
							  Sub Image 1
							</label>
							<input type="text" class="form-control" name="subImg1" autocomplete="off" id="subImg1"/>
						  </div>
						  
						  <div class="form-group">
							<label for="subImg2">
							  Sub Image 2
							</label>
							<input type="text" class="form-control" name="subImg2" autocomplete="off" id="subImg2"/>
						  </div>
						  
						  <div class="form-group">
							<label for="subImg3">
							  Sub Image 3
							</label>
							<input type="text" class="form-control" name="subImg3" autocomplete="off" id="subImg3"/>
						  </div>
						  
						  
						  
						  
						  
						 <div class="text-center"> 
						  <button class="btn btn-primary"/>Add This Product</button>
						 </div>	
					  </form>
				  
			  </div>
	
	</div>
</div>
	
	
	
	
	
	
	<?php include 'footer.php';?>
   
       
   
   
   
   

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>