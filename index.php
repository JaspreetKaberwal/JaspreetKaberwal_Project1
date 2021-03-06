
<!-- Jaspreet Singh Kaberwal Project 1 8622568 -->
<!-- HTML -->
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
        
        <div id="slider-wrapper">
            <!-- slider controls -->
            <div class="slider-controls">
                <button class="next"><i class="fas fa-chevron-right"></i></button>
                <button class="prev"><i class="fas fa-chevron-left"></i></button>
            </div>
            <!-- slider items -->
            <div class="slider-items">
                <div class="slider-item">
                    <div class="content">
                        
                        <img src="Image/img1.jpg">
                    </div>
                </div>
            </div>  
        </div>
         <div id="about_illusions">
            <h1>Book Store</h1>
            <p>Choose The Books</p>
           
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
