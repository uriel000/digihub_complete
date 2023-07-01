<?php

include 'config.php';
session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
    header('location:login.php');
}

if(isset($_POST['add_to_cart'])){
    $product_name = mysqli_real_escape_string($conn, $_POST['product_name']);
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];
    $product_category = $_POST['product_category'];
    $product_id = $_POST['product_id'];
    $product_quantity = $_POST['product_quantity'];
    $seller_id = $_POST['seller_id'];

    $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `cart` WHERE name= '$product_name' AND user_id = '$user_id'") or die("Query failed");

    if(mysqli_num_rows($check_cart_numbers) >0){
        $message[] = 'Already added to cart';
    }else {
        mysqli_query($conn, "INSERT INTO `cart` (user_id, name, price, quantity, image, product_id, seller_id) VALUES ('$user_id', '$product_name', '$product_price', '$product_quantity', '$product_image', '$product_id', '$seller_id')") or die ("Query failed");
         $message[] = 'Product is added to your cart';
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
    <title>Search</title>


        <!-- font awesome cdn link -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    />
</head>
<body>
    <?php include "header.php" ?>
    <div class="heading">
        <h3>Search page</h3>
        <p><a href="home.php">home</a> / search</p>
    </div>

    <section class="search-form">
    <form action="" method="post" >
        <input type="text" name="search" placeholder="Search products..." class="box">
        <select name="category" class="box">
                <option value="all">All</option>
                <option value="ebook">E-Book</option>
                <option value="audiobook">Audiobook</option>
                <option value="course">Online Course</option>
                <option value="software">Software</option>
                <option value="template">Template</option>
                <option value="graphic">Graphic and Digital Art</option>
                <option value="patterns">Patterns and Printables</option>
                <option value="music">Music and Audio</option>
                <option value="preset">Photo Preset</option>
                <option value="font">Font</option>
                <option value="photography">Photography</option>
                <option value="video">Video</option>
                <option value="document">Document</option>
                <option value="other">Others</option>
            </select>
        <input type="submit" value="Search" name="submit" class="btn">
    </form>
    </section>

    <section class="products" style="padding-top:0;">

    <div class="box-container">
        <?php
            if(isset($_POST['submit'])){
                $search_item = $_POST['search'];
                $cat = $_POST['category'];
                if($cat == 'all'){
                    $select_products = mysqli_query($conn, "SELECT * FROM `products` WHERE name LIKE '%{$search_item}%'") or die("Query failed");
                }else{
                    $select_products = mysqli_query($conn, "SELECT * FROM `products` WHERE name LIKE '%{$search_item}%' AND category='$cat'") or die("Query failed"); 
                }

                if(mysqli_num_rows($select_products) >0){
                    while($fetch_products = mysqli_fetch_assoc($select_products)){
                        
        ?>
            <form action="" method="post" class="box">
            
                 <img src="uploaded_img/<?php echo $fetch_products['image']?>" alt="">
                 <div class="name"><?php echo $fetch_products['name']?></div>
                 <div class="price">₱<?php echo $fetch_products['price']?></div>
                 <div class="category"><?php echo $fetch_products['category']?></div>
                 
                 <!-- <div class="description"><?php echo $fetch_products['description']?>"</div> -->
                 <input type="number" name="product_quantity" value="1" min="1" class="qty">
                 <input type="hidden" name="product_name" value="<?php echo $fetch_products['name']?>">
                 <input type="hidden" name="product_price" value="<?php echo $fetch_products['price']?>">
                 <input type="hidden" name="product_image" value="<?php echo $fetch_products['image']?>">
                 <input type="hidden" name="product_category" value="<?php echo $fetch_products['category']?>">
                 <input type="hidden" name="product_description" value="<?php echo $fetch_products['description']?>">
                 <input type="hidden" name="product_file_link" value="<?php echo $fetch_products['file_link']?>">
                 <input type="submit" value="Add to cart" name="add_to_cart" class="btn">
                 <input type="hidden" name="product_id" value="<?php echo $fetch_products['id']?>">
                 <input type="hidden" name="seller_id" value=<?php echo $fetch_products['seller_id'];?>>

            </form>        
        <?php
                    }
                }else{
                    echo '<p class="empty">No such product is found</p>';
                }
            }else{
                 echo '<p class="empty">Search a product :D </p>';
            }
        ?>

    </div>


    </section>

    



    <?php include "footer.php" ?>
    
</body>
</html>