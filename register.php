<?php
include 'config.php';

if(isset($_POST['submit'])){
/* 
mysqli_real_escape_string: used to It is used to escape special characters in a string that is going to be used in a MySQL query

md5: The MD5 algorithm takes an input (in this case, a string) and produces a 128-bit (16-byte) hash value.
*/

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
    $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));
    $user_type = $_POST["user_type"];

    $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email' AND password = '$pass'") or die("Query failed"); 

    if(mysqli_num_rows($select_users) >0){
        $message[] = 'User account already exist!';
    }else{
        if($pass != $cpass){
            $message[] = "Confirm password does not match!";
        }else{
            mysqli_query($conn, "INSERT INTO `users`(name, email, password, user_type) VALUES ('$name', '$email', '$cpass', '$user_type')") or die("Query");
            $message[] = "Account is registered successfully!";
            header('location:login.php');
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sign Up</title>
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
        <h3>Sign Up now!</h3>
        <input
          type="text"
          name="name"
          placeholder="Enter your name"
          required
          class="box"
        />
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
          type="password"
          name="cpassword"
          placeholder="Confirm your password"
          required
          class="box"
        />
        <select name="user_type" class="box">
          <option value="user">E-Shopper</option>
          <option value="seller">Seller</option>
        </select>
        <input
          type="submit"
          name="submit"
          value="Register"
          class="btn"
        />
        <p>Already have an account? <a href="login.php">Login now!</a></p>
      </form>
    </div>
  </body>
</html>
