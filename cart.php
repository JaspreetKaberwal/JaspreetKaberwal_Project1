<!-- Jaspreet Singh Kaberwal Project 1 8622568 -->
<!-- PHP -->
<?php 

	$error = array();

	if(isset($_GET['InventoryId'])) {
       
		$InventoryId = '';
        $PrName = '';
        $PrQty = '';
        
		
		$InventoryId = $_GET['InventoryId'];

		$conn = mysqli_connect("localhost", "root", "", "BookStore");

		$db_form_query = mysqli_query($conn, "SELECT * FROM BookInventory WHERE InventoryId = $InventoryId");
		$db_form_query_results = mysqli_fetch_array($db_form_query);

		$PrName = $db_form_query_results['ProductName'];
		$PrQty = $db_form_query_results['Quantity'];
		
		; 
	}

    if ($_SERVER['REQUEST_METHOD'] == "POST")
   
    {
        
    	$FirstName = $_POST['FirstName'];
		$LastName = $_POST['LastName'];
		
		$PrQty = $db_form_query_results['Quantity'];
		$Payment = $_POST['Payment'];
		

		if(empty($FirstName) || strlen($FirstName) == 0) {
 			array_push($error, "<br><br><br><br>First Name is required.<br><br>");
    	} else {
        	$FirstName = filter_var($_POST['FirstName'], FILTER_SANITIZE_STRING);
   		}
		if(empty($LastName) || strlen($LastName) == 0) {
 			array_push($error, "Last Name is required.<br><br>");
    	} else {
        	$LastName = filter_var($_POST['LastName'], FILTER_SANITIZE_STRING);
   		}
		
		if(empty($Payment) || strlen($Payment) == 0) {
			array_push($error, "Please choose a payment method. <br><br>");
		} else {
			$Payment = filter_var($_POST['Payment'], FILTER_SANITIZE_STRING);
		}
       
        $conn = mysqli_connect("localhost", "root", "", "BookStore");
        $sql = mysqli_query($conn, "SELECT * FROM BookInventory");
        

		$productID = $_POST['inventoryId']; 
        // session start
        session_start();
        $_SESSION['productID'] = $productID;
        
        if(empty($error))
	 	{
	 		$conn = mysqli_connect("localhost", "root", "", "BookStore");
	 		$insert = mysqli_query($conn,"INSERT INTO users VALUES ('','$FirstName','$LastName','$Payment','$productID')");

	 		$query = mysqli_query($conn, "SELECT * FROM BookInventory WHERE InventoryId = $productID");
	 		$details = mysqli_fetch_array($query);

	 		
            
            session_start();
            $productID = $_SESSION['productID'];
            $q = "UPDATE BookInventory SET Quantity = '$PrQty' WHERE InventoryId= $productID";
            
             $sql1 = mysqli_query($conn, $q);
            

	 		header("Location: thanks.php");
	 	}else{
	 		foreach ($error as $key => $value) {
	 			echo $value;
	 		}
	 		
	 	}
	}

 ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Book Store</title>
    <link rel="stylesheet" href="css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/script.js"></script>
</head>

<body>
    <main>
	<header>
            
            <nav>
                <ul id="nav_items">
                    <li class="current"><a href="index.php">HOME</a></li>
                    <li><a href="store.php">STORE</a></li>
                    <li><a href="cart.php">CART</a></li>
                     <li><a href="thanks.php">CHECK OUT</a></li>
                </ul>
            </nav>
            <span class="toggle_nav" style="font-size:30px;cursor:pointer">&#9776;</span>
            <div id="mySidenavOverlay" class="sidenav"></div>
            <div id="mySidenav" class="sidenav">
                <a href="javascript:void(0)" class="closebtn">&times;</a>
                <ul id="nav_items">
                    <li class="current"><a href="index.php">HOME</a></li>
                    <li><a href="store.php">STORE</a></li>
                    <li><a href="cart.php">CART</a></li>
                    <li><a href="thanks.php">CHECK OUT</a></li>
                </ul>
            </div>
        </header>
        <br>
         <br>
         <br>
        
        <div class="services_wrapper">
            <div class="services_top">
                <h1>Order Details</h1>
            </div>
        
        <br>
        <br>
        <br>
         <div class='confirmation col-sm-20'>
 	<div class='form'>
 		<form class="form-horizontal" action='cart.php' method='post'>
            <input type="hidden" name="inventoryId" value="<?php
                    if (isset($InventoryId)) {
                        echo $InventoryId;
                    }
                   
                   ?>">
 			<div class="form-group text-center" ><br><br>
				
			    <label class="control-label col-sm-6" >Product Name:</label>
			      <input type="text" class="form-control"  value="<?php echo $PrName; ?>" disabled="disabled" style="margin-left:60px;">
			 </div><br>

 			

			 <div class="form-group">
			    <label class="control-label col-sm-6">First Name:</label>
			      <input type="text" class="form-control" value="" name="FirstName" style="margin-left:90px;">
			 </div><br>
			 
			 <div class="form-group">
			    <label class="control-label col-sm-6">Last Name:</label>
			      <input type="text" class="form-control" value="" name="LastName" style="margin-left:90px;">
			 </div><br>
			 
 			
 			<div class="form-group">
 				<label class="control-label col-sm-6">Payment:</label>
			      <select name="Payment" style="color: black; margin-left:105px">
					<option value="Credit Card">Credit Card</option>
					<option value="Debit Card">Debit Card</option>
					<option value="Cash on Delivery">Cash On Delivery</option>
				  </select>
				 </div> <br>
            <br>
			<div class="form-group"> 
			    <div class="col-sm-offset-6">
			      <button type="submit" class="btn btn-primary" name="submit" style="margin-left:470px; width: 120px; height:30px; " >Submit</button>
			    </div>
			</div>
 		</form>
 	</div>
 </div>
            </div>
       
    <br>
        <footer>
		<p> <strong>Copyright&copy;</strong> </p>
        Jaspreet
        <script type="text/javascript">
            document.write(new Date().getFullYear());
        </script>
        </footer>
    </main>

</body>

</html>
