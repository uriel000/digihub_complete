<?php

include 'config.php';
session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
    header('location:login.php');
}

if(isset($_POST['order_btn'])){
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $number = $_POST['number'];
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $address = mysqli_real_escape_string($conn, $_POST['flat'].' '. $_POST['street']. ', Barangay ' . $_POST['barangay']. ', '. $_POST['city']. ', '. $_POST['country'].', ' . $_POST['zipcode']);
    $placed_on = date('d-M-Y');
    $method = $_POST['payment-method'];
    $cart_query = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die("Query failed");
    if(mysqli_num_rows($cart_query)>0){
        while($cart_item = mysqli_fetch_assoc($cart_query)){
            $product_name = mysqli_real_escape_string($conn, $cart_item['name']);
            $seller_id = $cart_item['seller_id'];
            $quantity = $cart_item['quantity'];
            $cart_total = ($cart_item['price'] * $cart_item['quantity']);
            mysqli_query($conn, "INSERT INTO `orders` (user_id, name, number, email, method, address, product_name, total_products, total_price, placed_on, payment_status, seller_id) VALUES ('$user_id', '$name', '$number', '$email','$method', '$address', '$product_name', '$quantity', '$cart_total', '$placed_on', 'pending', '$seller_id')") or die("Query failed") or die("Query Failed"); 
                }
    }else{
        $message[] = "Your cart is empty.";
    }
    $message[] = "Order placed successfully. Thank you for your purchase!";
    mysqli_query($conn, "DELETE FROM `cart` WHERE user_id = '$user_id'") or die("Query Failed");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Custom CSS file link -->
    <link rel="stylesheet" href="css/style.css">

    <!-- Custom js file link -->
    <script src="js/script.js" defer></script>
    <title>Checkout</title>

        <!-- font awesome cdn link -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    />
</head>
<body>
    <?php include "header.php" ?>
   <div class="heading">
        <h3>Checkout</h3>
        <p><a href="home.php">home</a> / checkout</p>
    </div>


    <section class="display-order">
        <?php
            $grand_total = 0;
            $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die("Query failed");
            if(mysqli_num_rows($select_cart) > 0) {
                while($fetch_cart = mysqli_fetch_assoc($select_cart)){
                    $total_price = ($fetch_cart['price'] * $fetch_cart['quantity']);
                    $grand_total += $total_price;
        ?>
       <div class="order-box">
         <img src="uploaded_img/<?php echo $fetch_cart['image']?>" alt="">
        <p><?php echo $fetch_cart['name']; ?></p>
        <p class="span">₱<?php echo $fetch_cart['price'] .' x '. $fetch_cart['quantity'];?></p>
       </div>

        <?php
                }

            }else{
                echo "<p class='empty'>Your cart is empty</p>";
            }        
        ?>
        <div class="grand-total">
            Grand Total: <span>₱<?php
                echo $grand_total;
            ?></span>
        </div>
        
    </section>

    <section class="checkout">
        <form action="" method="post">
            <h3>Place your order</h3>
            <div class="flex">
                <div class="inputBox">
                    <span>Your name:</span>
                    <input type="text" name="name" required placeholder="Enter your name">
                </div>
                <div class="inputBox">
                    <span>Your number:</span>
                    <input type="number" name="number" required placeholder="Enter your number">
                </div>
                <div class="inputBox">
                    <span>Your email:</span>
                    <input type="email" name="email" required placeholder="Enter your email">
                </div>
                <div class="inputBox">
                    <span>Payment method:</span>
                    <select name="payment-method" required>
                        <option disabled selected>Choose payment method</option>
                        <option value="gcash">GCash</option>
                        <option value="paypal">Paypal</option>
                        <option value="maya">Maya</option>
                        <option value="credit">Credit Card</option>
                        <option value="debit">Debit Card</option>
                    </select>
                </div>
                <div class="inputBox">
                    <span>House number: </span>
                    <input type="number" min="0" name="flat" required placeholder="Enter your house number">
                </div>
                <div class="inputBox">
                    <span>Street:</span>
                    <input type="text" name="street" required placeholder="Enter your street">
                </div>
                <div class="inputBox">
                    <span>Barangay:</span>
                    <input type="text" name="barangay" required placeholder="Enter your barangay">
                </div>
                <div class="inputBox">
                    <span>City:</span>
                    <input type="text" name="city" required placeholder="Enter your city">
                </div>
                <div class="inputBox">
                    <span>Country:</span>
                    <input type="text" name="country" required placeholder="Enter your country">
                </div>
                <div class="inputBox">
                    <span>Zipcode:</span>
                    <input type="number" min='0' name="zipcode" required placeholder="Enter your zipcode">
                </div>
            </div>
            <input type="submit" value="Place order" class="btn" name="order_btn">
        </form>
    </section>

    <?php include "footer.php" ?>
    
</body>
</html>