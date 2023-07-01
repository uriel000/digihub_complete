<?php
include 'config.php';
session_start();

if(isset($_POST['submit'])){
/* 
mysqli_real_escape_string: used to It is used to escape special characters in a string that is going to be used in a MySQL query

md5: The MD5 algorithm takes an input (in this case, a string) and produces a 128-bit (16-byte) hash value.
*/
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = mysqli_real_escape_string($conn, md5($_POST['password']));

    $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email' AND password = '$pass'") or die("Query failed"); 

    if(mysqli_num_rows($select_users) >0){

        $row = mysqli_fetch_assoc($select_users);

      if($row['user_type'] == 'admin'){

         $_SESSION['admin_name'] = $row['name'];
         $_SESSION['admin_email'] = $row['email'];
         $_SESSION['admin_id'] = $row['id'];
         header('location:admin_page.php');

      }elseif($row['user_type'] == 'user'){

         $_SESSION['user_name'] = $row['name'];
         $_SESSION['user_email'] = $row['email'];
         $_SESSION['user_id'] = $row['id'];
         header('location:home.php');

      }elseif($row['user_type'] == 'seller'){

            $_SESSION['seller_name'] = $row['name'];
            $_SESSION['seller_email'] = $row['email'];
            $_SESSION['seller_id'] = $row['id'];
            header('location:seller_page.php');

        }
    }else{
     $message[] = "Incorrect email or password!";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sign In</title>
    <!-- font awesome cdn link -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    />

    <!-- custom css file link -->
    <link rel="stylesheet" href="css/style.css" />
  </head>
  <body>


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
    <div class="form-container">
      <form action="" method="post">
        <h3>Sign In!</h3>
        <input
          type="email"
          name="email"
          placeholder="Enter your email"
          required
          class="box"
        />
        <input
          type="password"
          name="password"
          placeholder="Enter your password"
          required
          class="box"
        />

        <input
          type="submit"
          name="submit"
          value="Login"
          class="btn"
        />
        <p>Do not have an account yet? <a href="register.php">Register now!</a></p>
      </form>
    </div>
  </body>
</html>
