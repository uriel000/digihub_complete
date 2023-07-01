<?php

include 'config.php';
session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
    header('location:login.php');
}

if(isset($_GET['delete'])){
  $delete_id = $_GET['delete'];
  $delete_type = mysqli_query($conn, "SELECT user_type FROM `users` WHERE id ='seller'");
  if($delete_type == "user"){
    mysqli_query($conn, "DELETE FROM `users` WHERE id='$delete_id'") or die("Query Failed");
    header("location:admin_users.php");
  }else {
    mysqli_query($conn, "DELETE FROM `users` WHERE id='$delete_id'") or die("Query Failed");
    mysqli_query ($conn, "DELETE FROM `products` WHERE seller_id='$delete_id'");
    header("location:admin_users.php");
  }
}


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Users</title>
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

    <section class="users">
      <h1 class="title"><span class="digihub">DigiHub</span> User Accounts</h1>
      <div class="box-container">
<?php
  $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE user_type != 'admin'") or die("Query Failed");
  if(mysqli_num_rows($select_users) > 0){
    while($fetch_users= mysqli_fetch_assoc($select_users)){
?>
      <div class="box">
        <p>Name: <span><?php echo $fetch_users['name'];?></span></p>
        <p>Email: <span><?php echo $fetch_users['email'];?></span></p>
        <p>Type: <span style="color: <?php if($fetch_users['user_type'] == 'seller'){ echo 'var(--orange)';}else{echo 'var(--purple)';}?>"><?php echo $fetch_users['user_type'];?></span></p>

        <a href="admin_users.php?delete=<?php echo $fetch_users['id']; ?>" onclick="return confirm('Are you sure you want to remove this user?');" class="delete-btn">Remove User</a>
      </div>
<?php
    }
  }else{
    echo "<p class='empty'>No users yet</p>";
  }
?>
      </div>
    </section>
      </div>
    </section>
  </body>
</html>
