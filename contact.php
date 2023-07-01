<?php

include 'config.php';
session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
    header('location:login.php');
}

if(isset($_POST["send"])){
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $number = $_POST['number'];
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $messages = mysqli_real_escape_string($conn, $_POST['message']);

    $select_message = mysqli_query($conn, "SELECT * FROM `message` WHERE name='$name' AND email='$email' AND number='$number' AND message ='$messages'") or die("Query failed");

    if(mysqli_num_rows($select_message)>0){
        $message[] = 'Message already exist!';
    }else{
        mysqli_query($conn, "INSERT INTO `message` (user_id, name, email, number, message) VALUES ('$user_id','$name','$email','$number','$messages')") or die("Query failed");
        $message[] = 'Message sent successfully';
    }


    
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
    <title>Contact</title>

        <!-- font awesome cdn link -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    />
</head>
<body>
    <?php include "header.php" ?>
    <div class="heading">
        <h3>Contact us</h3>
        <p><a href="home.php">home</a> / contact</p>
    </div>

    <section class="contact">
        <form action="" method="post">
            <h3>Say something</h3>
            <input type="text" name="name" required placeholder="Enter your name" class="box">
            <input type="email" name="email" required placeholder="Enter your email" class="box">
            <input type="number" name="number" required placeholder="Enter your number" class="box">
            <textarea name="message" class="box" required placeholder="Enter your message" id="" cols="30" rows="10"></textarea>
            <input type="submit" value="Send message" name="send" class="btn">
        </form>
        
    </section>


    <?php include "footer.php" ?>
    
</body>
</html>





