<?php

include 'config.php';
session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
    header('location:login.php');
}

if(isset($_POST['update_order'])){
  $order_update_id = $_POST['order_id'];
  $update_payment = $_POST['update_payment'];
  mysqli_query($conn, "UPDATE `orders` SET payment_status = '$update_payment' WHERE id = '$order_update_id'") or die("Query failed");
  $message[] = "Payment status has been updated";
}

if(isset($_GET['delete'])){
  $delete_id = $_GET['delete'];
  mysqli_query($conn, "DELETE FROM `orders` WHERE id = '$delete_id'") or die("Query Failed");
  header("location:admin_orders.php");
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Orders</title>
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

    <section class="orders">

    <h1 class="title"><span class="digihub">DigiHub</span> Placed Orders</h1>
    <h3 class="status_orders" style="background-color:#ce2029;">Pending Orders</h3>
    <div class="box-container" >
      <?php
        $select_orders = mysqli_query($conn, "SELECT * FROM `orders` WHERE payment_status='pending'") or die("Query Failed");
        if(mysqli_num_rows($select_orders) > 0){
          while($fetch_orders = mysqli_fetch_assoc($select_orders)){
      ?>
      <div class="box">
        <p>User id: <span><?php echo $fetch_orders['user_id'];?></span></p>
        <p>Placed on: <span><?php echo $fetch_orders['placed_on'];?></span></p>
        <p>E-shopper: <span><?php echo $fetch_orders['name'];?></span></p>
        <p>Number: <span><?php echo $fetch_orders['number'];?></span></p>
        <p>Email: <span><?php echo $fetch_orders['email'];?></span></p>
        <p>Address: <span><?php echo $fetch_orders['address'];?></span></p>
         <p>Product name: <span><?php echo $fetch_orders['product_name'];?></span></p>
        <p>Total products: <span><?php echo $fetch_orders['total_products'];?></span></p>
        <p>Total Price: <span>₱ <?php echo $fetch_orders['total_price'];?></span></p>
        <p>Payment Method: <span><?php echo $fetch_orders['method'];?></span></p>
        <p>Payment Status: <span><?php echo $fetch_orders['payment_status'];?></span></p>
        <form action="" method="post">
          <input type="hidden" name="order_id" value="<?php echo $fetch_orders['id'];?>">
          <select name="update_payment">
            <option value="pending" selected>Pending</option>
            <option value="completed">Completed</option>
          </select>
          <input type="submit" value="Update" name="update_order" class="option-btn">
          <a href="admin_orders.php?delete=<?php echo $fetch_orders['id']; ?>" onclick="return confirm('Delete this order?');" class="delete-btn">Remove</a>
        </form>
      </div>
        <?php
      }
        }else {
          echo "  <p class='empty'>No pending orders yet</p>";
        }
  ?>
  </div>

    <h3 class="status_orders" style="background-color:#b19cd9;">Completed Orders</h3>
    <div class="box-container">
      <?php
        $select_orders = mysqli_query($conn, "SELECT * FROM `orders` WHERE payment_status='completed'") or die("Query Failed");
        if(mysqli_num_rows($select_orders) > 0){
          while($fetch_orders = mysqli_fetch_assoc($select_orders)){
      ?>
      <div class="box">
        <p>User id: <span><?php echo $fetch_orders['user_id'];?></span></p>
        <p>Placed on: <span><?php echo $fetch_orders['placed_on'];?></span></p>
        <p>E-shopper: <span><?php echo $fetch_orders['name'];?></span></p>
        <p>Number: <span><?php echo $fetch_orders['number'];?></span></p>
        <p>Email: <span><?php echo $fetch_orders['email'];?></span></p>
        <p>Address: <span><?php echo $fetch_orders['address'];?></span></p>
         <p>Product name: <span><?php echo $fetch_orders['product_name'];?></span></p>
        <p>Total products: <span><?php echo $fetch_orders['total_products'];?></span></p>
        <p>Total Price: <span>₱ <?php echo $fetch_orders['total_price'];?></span></p>
        <p>Payment Method: <span><?php echo $fetch_orders['method'];?></span></p>
        <p>Payment Status: <span><?php echo $fetch_orders['payment_status'];?></span></p>
        <form action="" method="post">
          <input type="hidden" name="order_id" value="<?php echo $fetch_orders['id'];?>">
          <select name="update_payment">
            <option value="pending">Pending</option>
            <option value="completed" selected>Completed</option>
          </select>
          <input type="submit" value="Update" name="update_order" class="option-btn">
          <a href="admin_orders.php?delete=<?php echo $fetch_orders['id']; ?>" onclick="return confirm('Delete this order?');" class="delete-btn">Remove</a>
        </form>
      </div>
        <?php
      }
        }else {
          echo "  <p class='empty'>No completed orders yet</p>";
        }
  ?>
  </div>
</section>






  </body>
</html>
