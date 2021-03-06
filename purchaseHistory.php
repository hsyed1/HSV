<?php
require 'Database.php';
require 'getProductInfo.php';
require 'checkInCart.php';
session_start();

if(isset($_SESSION['id'])){
	$userId = $_SESSION['id'];
	$sql = "SELECT * FROM purchaseHistory, Inventory where purchaseHistory.productId = Inventory.productID AND purchaseHistory.userId ='$userId' ";
	$result = $mysqli->query($sql);
	//$productInPurchaseHistory = $result->fetch_assoc();
}


?>

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
		 <div class="panel-group">
			
			<?php
				if(isset($_SESSION['id'])){
				while ( $row = $result->fetch_assoc() ){ ?>
				
				
				<div class="panel panel-default">
				<div class="row">
					<a href="productDetail.php?productId=<?php echo $row['productId']; ?>">
						
						<div class="col-md-3">
							<img src="<?php echo $row['productImage'];?>" class="img-responsive center-block" alt="books" style="max-height: 20em;"   >
						</div>
						<div class="col-md-7">
							<p><strong class="text-primary">Product Name: </strong><span class="text-success"><?php echo $row['productName'];?><span></p>
							<p><strong class="text-primary">Product Description:</strong> <span class="text-success"><?php echo $row['productDescShort'];?></span></p>
							<p><strong class="text-primary">Quantity Purchased:</strong><span class="text-success"><span class="label label-success"><?php echo " ".$row['quantityPurchased'];?></span></span></p>
							<p><strong class="text-primary">Cost:</strong><span class="text-success"><?php echo $row['productPrice'];?></span></p>

							<p><strong class="text-primary">Purchase Date and Time:</strong><span class="text-success"><?php echo $row['dateTimePurchased'];?></span></p>					
						</div>
					</a>
					<form action="setTheCookies.php" method="post">
						<div class="col-md-2">
						<?php $productQuantityAvail = getProductQuantity($row['productId']);?>
								<input type="text" class="hidden" name="productId" value="<?php echo $row['productId'] ?>">
								<p class="text-center text-primary <?php echo checkIfAlreadyInCartThenHide($row['productId']);?>"><strong>Select Quantity</strong></p>
								<p  class="text-center <?php echo checkIfAlreadyInCartThenHide($row['productId']);?>"><input style=" width: 30%;" type="number" value="1" step ="1" min="1" max="<?php echo $productQuantityAvail; ?>" name="qtyPurchased"/> </p><p class="text-center" style="color:blue;">Available in stock <?php echo getProductQuantity($row['productId']);?></p> 
								<p class="text-center"><button type="submit" class="btn btn-primary <?php if(getProductQuantity($row['productId'])==0){echo "hidden";} else{ echo checkIfAlreadyInCartThenHide($row['productId']);}?>"><i class="fa fa-shopping-cart"></i>Add to cart</button></p>
						        <a href="cart.php" type="submit" class="btn btn-primary <?php echo checkIfNotInCartThenHide($row['productId']);?>"><i class="fa fa-shopping-cart"></i>Go to cart</a>                  
						</div>
					</form>
				</div>
			</div>
				
				
				
				
			<?php 
					}
				}
				
				else{
					$cookieAry = unserialize($_COOKIE["notLoggedInUser"]);
						foreach ($cookieAry as $prodId => $quantity){ ?>
						
						
						<div class="panel panel-default">
						<div class="row">
							<a href="#">
								<div class="col-md-1">
								</div>
								<div class="col-md-2">
									<img src="img/historytest.jpeg" class="img-responsive" alt="books" width="110" >
								</div>
								<div class="col-md-7">
									<p><strong class="text-primary">Product Name: </strong><span class="text-success"><?php echo getProductName($prodId);?><span></p>
									<p><strong class="text-primary">Product Description:</strong> <span class="text-success"><?php echo getProductDesc($prodId);?></span></p>
									<p><strong class="text-primary">Quantity Purchased:</strong><span class="text-success"><?php echo $quantity;?></span></p>
									<p><strong class="text-primary">Cost:</strong><span class="text-success"><?php echo getProductPrice($prodId);?></span></p>
									
								</div>
							</a>
								<div class="col-md-2">
										<p class="text-center text-primary"><strong>Select Quantity</strong></p>
										<p class="text-center"><input type="number" step ="1" min="0" max="5" /></p>
										<p class="text-center"><button type="button" class="btn btn-primary">Add to cart</button></p>
									
								</div>
							
						</div>
					</div>
						
						
							
						<?php }
				}
				
			?>
			
			
			
			
			
			
			
			<!--<div class="panel panel-default">
				<div class="row">
					<a href="#">
						<div class="col-md-1">
						</div>
						<div class="col-md-2">
							<img src="img/historytest.jpeg" class="img-responsive" alt="books" width="110" >
						</div>
						<div class="col-md-7">
							<p><strong class="text-primary">Product Name: </strong><span class="text-success">Rolex Watch<span></p>
							<p><strong class="text-primary">Product Description:</strong> <span class="text-success">This is a Gold and silver plated watch</span></p>
							<p><strong class="text-primary">Quantity Purchased:</strong><span class="text-success">1</span></p>
							<p><strong class="text-primary">Cost:</strong><span class="text-success">300$</span></p>
							<p><strong class="text-primary">Purchase Date:</strong><span class="text-success">2/7/2016</span></p>					
						</div>
					</a>
						<div class="col-md-2">
								<p class="text-center text-primary"><strong>Select Quantity</strong></p>
								<p class="text-center"><input type="number" step ="1" min="0" max="5" /></p>
								<p class="text-center"><button type="button" class="btn btn-primary">Add to cart</button></p>
							
						</div>
					
				</div>
			</div>-->
		</div>			
	</div>
	
	
	
	
	
	<?php include 'footer.php';?>
   
       
   
   
   
   

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>