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
    <title>About</title>

        <!-- font awesome cdn link -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    />
</head>
<body>
    <?php include "header.php" ?>

    <div class="heading">
        <h3>About us</h3>
        <p><a href="home.php">home</a> / about</p>
    </div>

    <section class="about">
        <div class="flex">
            <div class="image">
                <img src="images/about-img.jpg" alt="">
            </div>
            <div class="content">
                <h3>Who are we?</h3>
                <p>DigiHub is a startup digital product store, founded by <span class="founder">Jesriel Ledesma</span> and <span class="founder">Nicole Rellosa</span>, that uses technology to simplify complex tasks and provides a perfect set of features for creators to scale up their online business. DigiHub is an easy-to-use eCommerce platform that offers individuals and businesses a chance to promote and sell downloadable or streamable digital files such as PDFs, videos, online courses, templates, music or audio, eBooks, stock photos, software, and more through online marketplace.</p>
                <p>
                    Discover a world of limitless possibilities with DigiHub, your go-to destination for high-quality digital goods. Whether you're an avid reader, a music lover, a creative professional, or a knowledge seeker, we've got you covered. At DigiHub, we simplify the way you access and enjoy digital content, right at your fingertips.
                </p>
                <p>
                    Explore a vast collection of digital products, including ebooks, audiobooks, music, templates, images, courses, and so much more. Our easy-to-use eCommerce platform connects you with talented creators from around the world, who are passionate about their craft and eager to share their work with you.
                </p>
                <p>
                    We believe in empowering creators to earn a living from doing what they love, while providing you with an unparalleled selection of digital experiences. No matter where you are, DigiHub lets you effortlessly access and enjoy your favorite digital content, anytime, anywhere.
                </p>
                <h3>Why choose DigiHub?</h3>
                <ol>
                    <li>Unleash your creativity: Support talented creators who pour their heart and soul into their work. Discover unique digital products that inspire and ignite your passion.
                    </li>
                    <li>
                        Convenience at your fingertips: No need to carry heavy books or CDs. With DigiHub, all your favorite digital content is just a click away, accessible on any device.
                    </li>
                    <li>
                        Endless possibilities: Dive into a world of endless possibilities with our wide range of digital products. From educational resources to entertainment, we have something for everyone.
                    </li>
                    <li>
                        Trusted platform: Rest assured knowing that you're shopping on a secure and reliable platform. Your digital purchases are safe, and your satisfaction is our top priority.
                    </li>
                </ol>
                <p>Join our vibrant community of creators and digital enthusiasts today. Start exploring DigiHub and unlock a world of digital wonders. Simplify your life, enhance your experiences, and support the creators who make it all possible.</p>
                <h6>DigiHub - Your gateway to a digital universe!</h6>
                <a href="contact.php" class="btn">Contact us</a>
            </div>
        </div>
    </section>

    <section class="reviews">
        <h1 class="title">Client's reviews</h1>
        <div class="box-container">
            <div class="box">
                <img src="images/pic-1.png" alt="">
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Similique hic est nostrum et quam explicabo nemo odio voluptates aut illo.</p>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <h3>Elon Musk</h3>
            </div>
            <div class="box">
                <img src="images/pic-2.png" alt="">
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Similique hic est nostrum et quam explicabo nemo odio voluptates aut illo.</p>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <h3>Kelly Clarkson</h3>
            </div>
            <div class="box">
                <img src="images/pic-3.png" alt="">
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Similique hic est nostrum et quam explicabo nemo odio voluptates aut illo.</p>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <h3>Theo James</h3>
            </div>
            <div class="box">
                <img src="images/pic-4.png" alt="">
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Similique hic est nostrum et quam explicabo nemo odio voluptates aut illo.</p>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <h3>Torry Kelly</h3>
            </div>
            <div class="box">
                <img src="images/pic-5.png" alt="">
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Similique hic est nostrum et quam explicabo nemo odio voluptates aut illo.</p>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <h3>Avan Jogia</h3>
            </div>
            <div class="box">
                <img src="images/pic-6.png" alt="">
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Similique hic est nostrum et quam explicabo nemo odio voluptates aut illo.</p>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <h3>Anonymous</h3>
            </div>
        </div>
    </section>

    <section class="authors">
        <h1 class="title">Our Founders</h1>

        <div class="box-container">
            <div class="box">
                <img src="images/author-1.jpg" alt="">
                <div class="share">
                     <a href="https://www.facebook.com/jesriel.d.ledesma" target="blank"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://github.com/uriel000" target="blank"><i class="fab fa-github"></i></a>
                    <a href="https://www.instagram.com/jxsrixl/" target="blank"><i class="fab fa-instagram"></i></a>
                    <a href="https://www.linkedin.com/in/ledesma-jesriel/" target="blank"><i class="fab fa-linkedin"></i></a>
                </div>
                <h3>Jesriel D. Ledesma</h3>
            </div>
            <div class="box">
                <img src="images/author-2.jpg" alt="">
                <div class="share">
                     <a href="https://www.facebook.com/jesriel.d.ledesma" target="blank"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://github.com/uriel000" target="blank"><i class="fab fa-github"></i></a>
                    <a href="https://www.instagram.com/jxsrixl/" target="blank"><i class="fab fa-instagram"></i></a>
                    <a href="https://www.linkedin.com/in/ledesma-jesriel/" target="blank"><i class="fab fa-linkedin"></i></a>
                </div>
                <h3>Nicole Francesca Rellosa</h3>
            </div>
        </div>
    </section>

    <?php include "footer.php" ?>
    
</body>
</html>