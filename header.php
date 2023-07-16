    <?php
    if(isset($message)){
        foreach($message as $message){
            echo '
            <div class="message">
            <span>'.$message.'</span>
            <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
            </div>

            ';
        }
    }

    ?>
    
<header class="header">
    <div class="header-1">
        <div class="flex">
            <div class="share">
                <a href="https://www.facebook.com/jesriel.d.ledesma" class="fab fa-facebook-f" target="blank"></a>
                <a href="https://github.com/uriel000" target="blank" class="fab fa-github"></a>
                <a href="https://www.instagram.com/jxsrixl/" target="blank" class="fab fa-instagram"></a>
                <a href="https://www.linkedin.com/in/ledesma-jesriel/" target="blank" class="fab fa-linkedin"></a>
            </div>
            <p style="display: <?php  if(isset($user_id)){ echo "none";}?>">New <a href="login.php">Login</a> | <a href="register.php">Register</a></p>
        </div>
    </div>
    <div class="header-2">
        <div class="flex">
            <a href="home.php" class="logo">digiHub</a>
            <nav class="navbar">
                <a href="home.php" class="<?php echo (basename($_SERVER['SCRIPT_NAME']) == "home.php") ? 'active' : ''; ?>">Home</a>
                <a href="about.php" class="<?php echo (basename($_SERVER['SCRIPT_NAME']) == "about.php") ? 'active' : ''; ?>">About</a>
                <a href="shop.php" class="<?php echo (basename($_SERVER['SCRIPT_NAME']) == "shop.php") ? 'active' : ''; ?>">Shop</a>
                <a href="contact.php" class="<?php echo (basename($_SERVER['SCRIPT_NAME']) == "contact.php") ? 'active' : ''; ?>">Contact</a>
                <a href="orders.php" class="<?php echo (basename($_SERVER['SCRIPT_NAME']) == "orders.php") ? 'active' : ''; ?>">Orders</a>
            </nav>
            <div class="icons">
                <div id="menu-btn" class="fas fa-bars"></div>
                <a href="search_page.php" class="fas fa-search"></a>
                <div id="user-btn" class="fas fa-user" ></div>
                <?php
               $select_cart_number = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
               $cart_rows_number = mysqli_num_rows($select_cart_number); 
            ?>
                <a href="cart.php"><i class="fas fa-shopping-cart" style="color:<?php echo (basename($_SERVER['SCRIPT_NAME']) == "cart.php") ? '#b19cd9' : ''; ?>"></i> <span>(<?php echo $cart_rows_number;?>)</span></a>
       </div>
            <div class="user-box">
                <p>Username : <span><?php echo $_SESSION['user_name']?></span></p>
                <p>Email : <span><?php echo $_SESSION['user_email']?></span></p>
                <a href="logout.php" class="delete-btn">Logout</a>
            </div>
        </div>
    </div>
</header>
