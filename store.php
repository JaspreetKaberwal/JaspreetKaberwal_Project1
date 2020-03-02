<!-- Jaspreet Singh Kaberwal Project 1 8622568 -->
<!-- HTML -->
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Book Store</title>
    <link rel="stylesheet" href="css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/script.js"></script>
</head>

<body>
    <main>
        <header>
            <!-- Navigation -->
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
        <div class="services_wrapper">
            <div class="services_top">
                <h1>Book Store</h1>
                <p>Choose Your Favourite Books</p>
            </div>
            <?php
			// daabase connection		
            $conn = mysqli_connect("localhost", "root", "", "BookStore");			
            $sql = mysqli_query($conn, "SELECT * FROM bookinventory");		
            $InventoryId = 'InventoryId';
            $ProductName = 'ProductName';
            $ProductDesc = 'ProductDesc';
            $ProductPrice = 'ProductPrice';
            $ProductQuantity = 'Quantity';
 			
            $form = " ";
						
				 if(mysqli_num_rows($sql) > 0) {
                    // fetching dara from database
                      while($row = mysqli_fetch_array($sql)) {
                          // variables storing data
				         $InventoryId = $row['InventoryId'];
				         $ProductName = $row['ProductName'];
				         $ProductQuantity = $row['Quantity'];
                         
				         
                            // from with submit button
				            $form .= "<div class=row>
                                      <br><br>
								      <div class='column'>
								      <h1>$ProductName</h1></<br>
								      
                                      <p>Quantity:$ProductQuantity</p><br>
				                      <div class='buyform' style='text-align:centre; margin-bottom:8em;'>
                                      
                                      <a href='cart.php?InventoryId=$InventoryId'>
								      <input type='submit' name='submit' value='Buy' class='btn btn-success' style='height:30px; width:80px';></a>
								      </div><br>
                                      </div>
								      </div>
											";
										}
				     	echo $form;
                        }
						?>

        </div>
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