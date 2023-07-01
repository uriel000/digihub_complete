<?php

include 'config.php';
session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
    header('location:login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Panel</title>
    <!-- font awesome cdn link -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    />

    <!-- custom admin css -->
    <link rel="stylesheet" href="css/admin_style.css" />

    <!-- custom admin js file link -->
    <script src="js/admin_script.js" defer></script>
  </head>
  <body>
    <?php include 'admin_header.php'?>

    <!-- admin dashboard section  -->

    <section class="dashboard">
      <h1 class="title"><span class="digihub-b">DigiHub</span> Dashboard</h1>
      <div class="box-container">

        <div class="box">
          <?php
            $total_pendings = 0;
            $select_pending = mysqli_query($conn, "SELECT total_price FROM `orders` WHERE payment_status = 'pending'") or die("Query Failed");
            if(mysqli_num_rows($select_pending)>0){
              while($fetch_pendings = mysqli_fetch_assoc($select_pending)){
               $total_price = $fetch_pendings['total_price']; 
               $total_pendings += $total_price; 
              }; 
            }; 
          ?>
          <h3>₱ <?php echo $total_pendings;?></h3>
          <p>Total pendings</p>
        </div>

        <div class="box">
          <?php
            $total_completed = 0;
            $select_completed = mysqli_query($conn, "SELECT total_price FROM `orders` WHERE payment_status = 'completed'") or die("Query Failed");
            if(mysqli_num_rows($select_completed)>0){
              while($fetch_completed = mysqli_fetch_assoc($select_completed)){
               $total_price = $fetch_completed['total_price']; 
               $total_completed += $total_price; 
              }; 
            }; 
          ?>
          <h3>₱ <?php echo $total_completed;?></h3>
          <p>Completed payments</p>
        </div>

        <div class="box">
            <?php 
                $select_orders = mysqli_query($conn, "SELECT * FROM `orders`") or die('Query failed');
                $number_of_orders = mysqli_num_rows($select_orders);
            ?>
            <h3><?php echo $number_of_orders?></h3>
            <p>Order placed</p>
        </div>

        <div class="box">
            <?php 
                $select_products = mysqli_query($conn, "SELECT * FROM `products`") or die('Query failed');
                $number_of_products = mysqli_num_rows($select_products);
            ?>
            <h3><?php echo $number_of_products?></h3>
            <p>Products added</p>
        </div>

        <div class="box">
            <?php 
                $select_accounts = mysqli_query($conn, "SELECT * FROM `users` WHERE user_type = 'user' OR user_type = 'seller'") or die('Query failed');
                $number_of_accounts = mysqli_num_rows($select_accounts);
            ?>
            <h3><?php echo $number_of_accounts?></h3>
            <p>Total users</p>
        </div>

        <div class="box">
            <?php 
                $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE user_type = 'user'") or die('Query failed');
                $number_of_users = mysqli_num_rows($select_users);
            ?>
            <h3><?php echo $number_of_users?></h3>
            <p>Total e-shoppers</p>
        </div>

        <div class="box">
            <?php 
                $select_sellers = mysqli_query($conn, "SELECT * FROM `users` WHERE user_type = 'seller'") or die('Query failed');
                $number_of_sellers = mysqli_num_rows($select_sellers);
            ?>
            <h3><?php echo $number_of_sellers?></h3>
            <p>Total sellers</p>
        </div>

        <div class="box">
            <?php 
                $select_messages = mysqli_query($conn, "SELECT * FROM `message`") or die('Query failed');
                $number_of_messages = mysqli_num_rows($select_messages);
            ?>
            <h3><?php echo $number_of_messages?></h3>
            <p>Total messages</p>
        </div>



      </div>
    </section>
  </body>
</html>
