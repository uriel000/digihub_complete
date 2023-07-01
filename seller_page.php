<?php

include 'config.php';
session_start();

$seller_id = $_SESSION['seller_id'];

// Checks if the session id is existing, if not it will not enter seller_page.php
if(!isset($seller_id)){
    header('location:login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller Panel</title>
    <!-- font awesome cdn link -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    />

    <!-- custom seller css -->
    <link rel="stylesheet" href="css/admin_style.css" />

      <!-- custom seller js file link -->
    <script src="js/seller_script.js" defer></script>
</head>
<body>

<?php include 'seller_header.php'?>

 <section class="dashboard">
      <h1 class="title">DIGIHUB SELLER Dashboard</h1>
      <div class="box-container">

        <div class="box">
          <?php
            $total_pendings = 0;
            $select_pending = mysqli_query($conn, "SELECT total_price FROM `orders` WHERE payment_status = 'pending' AND seller_id = '$seller_id'") or die("Query Failed");
            if(mysqli_num_rows($select_pending)>0){
              while($fetch_pendings = mysqli_fetch_assoc($select_pending)){
               $total_price = $fetch_pendings['total_price']; 
               $total_pendings += $total_price; 
              }; 
            }; 
          ?>
          <h3><?php echo $total_pendings;?></h3>
          <p>Total pendings</p>
        </div>

        <div class="box">
          <?php
            $total_completed = 0;
            $select_completed = mysqli_query($conn, "SELECT total_price FROM `orders` WHERE payment_status = 'completed'  AND seller_id = '$seller_id'") or die("Query Failed");
            if(mysqli_num_rows($select_completed)>0){
              while($fetch_completed = mysqli_fetch_assoc($select_completed)){
               $total_price = $fetch_completed['total_price']; 
               $total_completed += $total_price; 
              }; 
            }; 
          ?>
          <h3><?php echo $total_completed;?></h3>
          <p>Completed payments</p>
        </div>

        <div class="box">
            <?php 
                $select_orders = mysqli_query($conn, "SELECT * FROM `orders` WHERE seller_id = '$seller_id'") or die('Query failed');
                $number_of_orders = mysqli_num_rows($select_orders);
            ?>
            <h3><?php echo $number_of_orders?></h3>
            <p>Order placed</p>
        </div>

        <div class="box">
            <?php
                $select_products = mysqli_query($conn, "SELECT * FROM `products` WHERE seller_id = '$seller_id'") or die('Query failed');
                $number_of_products = mysqli_num_rows($select_products);
            ?>
            <h3><?php echo $number_of_products?></h3>
            <p>Products added</p>
        </div>


      </div>
    </section>
    
</body>
</html>
