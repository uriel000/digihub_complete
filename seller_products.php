<?php

include 'config.php';
session_start();

$seller_id = $_SESSION['seller_id'];

// Checks if the session id is existing, if not it will not enter seller_page.php
if(!isset($seller_id)){
    header('location:login.php');
}

// Code for ADDING PRODUCT TO THE DATABASE (CRUD)
if(isset($_POST["add_product"])){
    $name= mysqli_real_escape_string($conn, $_POST["name"]);
    $price= $_POST["price"];
    $description= mysqli_real_escape_string($conn, $_POST["description"]);
    $category = $_POST["category"];
    $link= mysqli_real_escape_string($conn, $_POST["link"]);
    $seller = mysqli_real_escape_string($conn, $_POST['seller']);
    $image = $_FILES['image']['name'];
    $image_size = $_FILES['image']['size'];
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_folder = 'uploaded_img/'.$image;

    $select_product_name = mysqli_query($conn, "SELECT name FROM `products` WHERE name = '$name'") or die("Query Failed");

    if(mysqli_num_rows($select_product_name)>0){
        $message[] = 'Product name already added';
    }else{
        $add_product_query = mysqli_query($conn, "INSERT INTO `products` (name, price, description, category, file_link, image, seller_id) VALUES ('$name', '$price', '$description', '$category', '$link', '$image', '$seller')") or die("Query Failed");

        if($add_product_query){
            if($image_size > 2000000){
                $message[] = "Image size is too large";
            }else{
                move_uploaded_file($image_tmp_name, $image_folder);
                $message[] = "Product added successfully!";
            }
        }else{
            $message[] = "Product could not be added";
        }

    }
}

// Code for DELETING PRODUCT TO THE DATABASE (CRUD)
if(isset($_GET['delete'])){
    $delete_id = $_GET['delete'];
   $delete_image_query = mysqli_query($conn, "SELECT image FROM `products` WHERE id = '$delete_id'") or die('query failed');
   $fetch_delete_image = mysqli_fetch_assoc($delete_image_query);
   unlink('uploaded_img/'.$fetch_delete_image['image']);
    mysqli_query($conn, "DELETE FROM `products` WHERE id = '$delete_id'") or die("Query Failed!");
    header("location:seller_products.php");
}

// Code for UPDATING PRODUCT TO THE DATABASE (CRUD)
if(isset($_POST["update_product"])){
    $update_p_id = $_POST['update_p_id'];
    $update_name =mysqli_real_escape_string($conn, $_POST["update_name"]);
    $update_price = mysqli_real_escape_string($conn, $_POST["update_price"]);
    $update_description = mysqli_real_escape_string($conn, $_POST["update_description"]);
    $update_category = mysqli_real_escape_string($conn, $_POST["update_category"]);
    $update_link = mysqli_real_escape_string($conn, $_POST["update_link"]);
    $update_seller =mysqli_real_escape_string($conn,  $_POST["update_seller"]);

    mysqli_query($conn, "UPDATE `products` SET name = '$update_name', price = '$update_price', description='$update_description', category='$update_category', file_link='$update_link', seller_id = '$update_seller' WHERE id = '$update_p_id'") or die("Query Failed");

   $update_image = $_FILES['update_image']['name'];
   $update_image_tmp_name = $_FILES['update_image']['tmp_name'];
   $update_image_size = $_FILES['update_image']['size'];
   $update_folder = 'uploaded_img/'.$update_image;
   $update_old_image = $_POST['update_old_image'];

   if(!empty($update_image)){
      if($update_image_size > 2000000){
         $message[] = 'image file size is too large';
      }else{
         mysqli_query($conn, "UPDATE `products` SET image = '$update_image' WHERE id = '$update_p_id'") or die('query failed');
         move_uploaded_file($update_image_tmp_name, $update_folder);
         unlink('uploaded_img/'.$update_old_image);
      }
   }

    header("location:seller_products.php");
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Products</title>
    <!-- font awesome cdn link -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    />

    <!-- custom admin css -->
    <link rel="stylesheet" href="css/admin_style.css" />

    <!-- custom admin js file link -->
    <script src="js/seller_script.js" defer></script>
  </head>
  <body>
    <?php include 'seller_header.php'?>


    <!-- Product CRUD section starts -->

    <section class="add-products">

    <h1 class="title">Shop products</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <h3>Add product</h3>
            <input type="text" name="name" class="box" placeholder="Enter product name" required>
            <input type="number" name="price" class="box" placeholder="Enter product price" min="0" required>
            <input type="text" name="description" class="box" placeholder="Enter product description" required>
            <select name="category" class="box" required>
                <option disabled selected>Choose Category</option>
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
            <input type="text" name="link" class="box" placeholder="Enter product link" required>
            <input type="hidden" name="seller" value="<?php echo $seller_id?>">
            <label for="image">Add thumbnail:</label>
            <input type="file" name="image" accept="image/jpg, image/jpeg, image/png" class="box" placeholder="Image or thumbnail" required>

            <input type="submit" value="Add product" name="add_product" class="btn">
        </form>
    </section>
    <!-- Product CRUD section ends -->

    <!-- show products -->
    <h1 class="title"><?php echo $_SESSION["seller_name"]?> products</h1>

    <section class="show-products">
        <div class="box-container">
            <?php
                $select_products = mysqli_query($conn, "SELECT * FROM `products` WHERE seller_id='$seller_id'") or die("Query failed");

                if(mysqli_num_rows($select_products)>0){
                    while($row = mysqli_fetch_assoc($select_products)){
            ?>
            <div class="box">
                <img src="uploaded_img/<?php echo $row['image'];?>" alt="<?php echo $row['name'];?> image">
                <div class="name"><?php echo $row['name'];?></div>
                <div class="price">₱ <?php echo $row['price'];?></div>
                <div class="description"><?php echo $row['description'];?></div>
                <a href="seller_products.php?update=<?php echo $row['id'];?>" class="option-btn">update</a>
                <a href="seller_products.php?delete=<?php echo $row['id'];?>" class="delete-btn" onclick="return confirm('Are you sure you want to delete this product?');">delete</a>
            </div>
            <?php
                    }
                }else{
                    echo '<p class="empty">No product added yet</p>';
                }
            ?>

        </div>
    </section>

    <!-- Update Products -->
    <section class="edit-product-form">
        <?php
            if(isset($_GET['update'])){
                $update_id = $_GET['update'];
                $update_query = mysqli_query($conn, "SELECT * FROM `products` WHERE id = '$update_id'") or die("Query failed");
                if(mysqli_num_rows($update_query)>0){
                    while($fetch_update = mysqli_fetch_assoc($update_query)){
        ?>
        <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="update_p_id" value="<?php echo $fetch_update['id'];?>">
            <input type="hidden" name="update_old_image" value="<?php echo $fetch_update['image'];?>">

            <img src="uploaded_img/<?php echo $fetch_update['image'];?>" alt="<?php echo $fetch_update['name'];?> image">

            <!-- Update name -->
            <input type="text" name="update_name" value="<?php echo $fetch_update['name'];?>" class="box" required placeholder="Enter product name">

            <!-- Update Price -->
            <input type="number" name="update_price" value="<?php echo $fetch_update['price'];?>" class="box" required placeholder="Enter product price" min='0'>

            <!-- Update Description -->
            <input type="text" name="update_description" value="<?php echo $fetch_update['description'];?>" class="box" required placeholder="Enter product description" >

            <!-- Update Category -->
            <select name="update_category" class="box" required>
                <option value="ebook" <?php echo $fetch_update['category']=== "ebook"? "selected":"";?> >E-Book</option>
                <option value="audiobook" <?php echo $fetch_update['category']=== "audiobook"? "selected":"";?>>Audiobook</option>
                <option value="course" <?php echo $fetch_update['category']=== "course"? "selected":"";?>>Online Course</option>
                <option value="software" <?php echo $fetch_update['category']=== "software"? "selected":"";?>>Software</option>
                <option value="template" <?php echo $fetch_update['category']=== "template"? "selected":"";?>>Template</option>
                <option value="graphic" <?php echo $fetch_update['category']=== "graphic"? "selected":"";?>>Graphic and Digital Art</option>
                <option value="patterns" <?php echo $fetch_update['category']=== "patterns"? "selected":"";?>>Patterns and Printables</option>
                <option value="music" <?php echo $fetch_update['category']=== "music"? "selected":"";?>>Music and Audio</option>
                <option value="preset" <?php echo $fetch_update['category']=== "preset"? "selected":"";?>>Photo Preset</option>
                <option value="font" <?php echo $fetch_update['category']=== "font"? "selected":"";?>>Font</option>
                <option value="photography" <?php echo $fetch_update['category']=== "photography"? "selected":"";?>>Photography</option>
                <option value="video" <?php echo $fetch_update['category']=== "video"? "selected":"";?>>Video</option>
                <option value="document" <?php echo $fetch_update['category']=== "document"? "selected":"";?>>Document</option>
                <option value="other" <?php echo $fetch_update['category']=== "other"? "selected":"";?>>Others</option>
            </select>

            <!-- Update Link -->
            <input type="text" name="update_link" value="<?php echo $fetch_update['file_link'];?>" class="box" required placeholder="Enter product link">

            <!-- Update Seller -->
            <input type="hidden" name="update_seller" value="<?php echo $seller_id?>">
            
            <!-- Update Image -->
            <input type="file" name="update_image" class="box" accept="image/jpg, image/jpeg, image/png">

            <!-- Buttons -->
            <input type="submit" value="update" name="update_product" class="btn">
            <input type="reset" value="cancel" id="close-update" class="option-btn">
        </form>
        <?php
                    }
                }
            }else{
                echo '<script>document.querySelector(".edit-product-form").style.display = "none";</script>';
            }
        ?>

    </section>




      </div>
    </section>
  </body>
</html>
