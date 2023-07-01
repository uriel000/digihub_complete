<?php

include 'config.php';
session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
    header('location:login.php');
}

if(isset($_POST['update_cart'])){
    $cart_id = $_POST['cart_id'];
    $cart_new_qty = $_POST["cart_quantity"];
    mysqli_query($conn, "UPDATE `cart`SET quantity = '$cart_new_qty' WHERE id= '$cart_id' and user_id='$user_id'") or die("Query failed");
    $message[] = "Quantity updated successfully!";

}

if(isset($_GET["delete"])){
    $cart_delete_id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM `cart` WHERE id='$cart_delete_id' AND user_id='$user_id'") or die("Quantity failed");
    header("location:cart.php");

}

if(isset($_GET['delete_all'])){
    mysqli_query($conn, "DELETE FROM `cart` WHERE user_id='$user_id'") or die("Query failed");
    header("location:cart.php");
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
    <title>Cart</title>

        <!-- font awesome cdn link -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    />
</head>
<body>
    <?php include "header.php" ?>
    <div class="heading">
        <h3>Your shopping cart</h3>
        <p><a href="home.php">home</a> / cart</p>
    </div>

    <section class="shopping-cart">
        <h1 class="title">Products added</h1>
        <div class="box-container">
            <?php
            $grand_total = 0;
            $total_products = 0;
            $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die("Query failed");
            if(mysqli_num_rows($select_cart) > 0){
                while($fetch_cart = mysqli_fetch_assoc($select_cart)){
            ?>
            <div class="box">

                <a href="cart.php?delete=<?php echo $fetch_cart['id']; ?>" class="fas fa-times" onclick="return confirm('Are you sure you want to remove this product from your cart?');"></a>
                <img src="uploaded_img/<?php echo $fetch_cart['image'];?>" alt="">
                <div class="name"><?php echo $fetch_cart['name'];?></div>
                <div class="price">₱<?php echo $fetch_cart['price'];?></div>
                <form action="" method="post">
                    <input type="hidden" name="cart_id" value="<?php echo $fetch_cart['id'];?>">
                    <input type="number" value="<?php echo $fetch_cart['quantity'];?>" min='1' name="cart_quantity">
                    <input type="submit" name="update_cart" value="update" class="option-btn">
                </form>
                <div class="sub-total">sub-total : <span>₱<?php echo $sub_total = $fetch_cart['price'] * $fetch_cart['quantity']?></span></div>
            </div>
            <?php
            $grand_total += $sub_total;
            $total_products += 1;
              }
            }else{
                echo "<p class='empty'>Your cart is empty</p>";
            }
            ?>
        </div>

        <div style="margin-top: 2rem; text-align:center;">
    <a href="cart.php?delete_all" class="delete-btn" onclick="return confirm('Are you sure you want to clear all cart contents?');" style="display: 
    <?php $check_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die("Query failed");
        if(mysqli_num_rows($check_cart) == 0){echo "none";}?>">Clear cart</a>
</div>

<div class="cart-total">
    <p>Total products: <span><?php echo $total_products?></span></p>
    <p>Grand total : <span>₱<?php echo $grand_total;?></span></p>
    <div class="flex">
        <a href="shop.php" class="option-btn">Continue Shopping</a>
        <a href="checkout.php" class="btn" style="display: 
    <?php $check_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die("Query failed");
        if(mysqli_num_rows($check_cart) == 0){echo "none";}?>">Proceed to checkout</a>
    </div>
</div>


    </section>



    <?php include "footer.php" ?>
    
</body>
</html>