<?php

include 'config.php';
session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
    header('location:login.php');
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
    <title>Order</title>

        <!-- font awesome cdn link -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    />
</head>
<body>
    <?php include "header.php" ?>
    <div class="heading">
        <h3>Your Order History</h3>
        <p><a href="home.php">home</a> / orders</p>
    </div>

    <section class="placed-orders">
        <h1 class="title">Pending orders</h1>
        <div class="box-container">
            <?php
                $order_query = mysqli_query($conn, "SELECT orders.name, orders.number, orders.email, orders.method, orders.address, orders.product_name, orders.total_products, orders.total_price, orders.placed_on, orders.payment_status, products.image FROM `orders` INNER JOIN `products` ON orders.product_name = products.name WHERE user_id = '$user_id' AND payment_status='pending'") or die("Query failed");
                if(mysqli_num_rows($order_query)>0){
                    while($fetch_orders = mysqli_fetch_assoc($order_query)){
            ?>
            <div class="box">
                <img src="uploaded_img/<?php echo $fetch_orders['image'];?>" alt="">
                <p>Placed on: <span><?php echo $fetch_orders['placed_on'];?></span></p>
                <p>Name: <span><?php echo $fetch_orders['name'];?></span></p>
                <p>Number: <span><?php echo $fetch_orders['number'];?></span></p>
                <p>Email: <span><?php echo $fetch_orders['email'];?></span></p>
                <p>Address: <span><?php echo $fetch_orders['address'];?></span></p>
                <p>Payment Method: <span><?php echo $fetch_orders['method'];?></span></p>
                <p>Product: <span><?php echo $fetch_orders['product_name'];?></span></p>
                <p>Total product: <span><?php echo $fetch_orders['total_products'];?></span></p>
                <p>Total amount: <span>₱<?php echo $fetch_orders['total_price'];?></span></p>
                <p>Payment status: <span style="color: <?php if($fetch_orders['payment_status']=='pending'){echo "red";}else{echo "green";}?>"><?php echo $fetch_orders['payment_status'];?></span></p>
               
            </div>
            <?php
                     }

                }else{
                    echo "<p class='empty'>You have no orders yet</p>";
                }           
            ?>
        </div>

         <h1 class="title">Completed orders</h1>
        <div class="box-container">
            <?php
                $order_query = mysqli_query($conn, "SELECT orders.name, orders.number, orders.email, orders.method, orders.address, orders.product_name, orders.total_products, orders.total_price, orders.placed_on, orders.payment_status, products.image, products.file_link FROM `orders` INNER JOIN `products` ON orders.product_name = products.name WHERE user_id = '$user_id' AND payment_status='completed'") or die("Query failed");
                if(mysqli_num_rows($order_query)>0){
                    while($fetch_orders = mysqli_fetch_assoc($order_query)){
            ?>
            <div class="box">
                <img src="uploaded_img/<?php echo $fetch_orders['image'];?>" alt="">
                <p>Placed on: <span><?php echo $fetch_orders['placed_on'];?></span></p>
                <p>Name: <span><?php echo $fetch_orders['name'];?></span></p>
                <p>Number: <span><?php echo $fetch_orders['number'];?></span></p>
                <p>Email: <span><?php echo $fetch_orders['email'];?></span></p>
                <p>Address: <span><?php echo $fetch_orders['address'];?></span></p>
                <p>Payment Method: <span><?php echo $fetch_orders['method'];?></span></p>
                <p>Product: <span><?php echo $fetch_orders['product_name'];?></span></p>
                <p>Total product: <span><?php echo $fetch_orders['total_products'];?></span></p>
                <p>Total amount: <span>₱<?php echo $fetch_orders['total_price'];?></span></p>
                <p>Payment status: <span style="color: <?php if($fetch_orders['payment_status']=='pending'){echo "red";}else{echo "green";}?>"><?php echo $fetch_orders['payment_status'];?></span></p>
                <div class="access">
                    <h3>Your access link:</h3>
                <p class="file_link"><span><a href="<?php echo $fetch_orders['file_link'];?>" target="blank"><?php echo $fetch_orders['file_link'];?></a></span></p>
                </div>
                
               
            </div>
            <?php
                     }

                }else{
                    echo "<p class='empty'>You have no orders yet</p>";
                }           
            ?>
        </div>
    </section>
    


    <?php include "footer.php" ?>
    
</body>
</html>