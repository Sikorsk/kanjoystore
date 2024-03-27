<?php
session_start();

if(isset($_POST['login'])) {
    $username = $_POST['username'];
    $_SESSION['user_name'] = $username;
    header('Location: user_page.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KANJOYSTORE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap">
    <link rel="stylesheet" href="home.css">
    <style>
       body {
   background-color: #101820FF;
   background-size: cover;
    background-repeat: no-repeat;
    justify-content: center;
}

.navbar-brand-container {
    position: absolute;
    left: 50%;
    transform: translateX(-50%);
}

.navbar {
    background-color: transparent !important;
}

.navbar-brand {
    font-weight: bold;
    font-style: italic;
    color: white;
    font-family: 'Poppins', sans-serif;
    font-size: 35px !important;
    padding: 5px 0;
    position: relative;
    transition: color 0.3s ease-in-out;
}

.navbar-brand:hover {
    color: palevioletred;
}

.navbar-nav .nav-link {
    font-weight: 600;
    font-style: normal;
    color: white;
    font-family: 'Poppins', sans-serif;
    font-size: 15px !important;
    border: 2px solid transparent;
    border-radius: 15px;
    padding: 8px 15px;
    position: relative;
    transition: background-color 0.2s ease-in;
    text-shadow: -1px -1px 0 #000, 1px -1px 0 #000, -1px 1px 0 #000, 1px 1px 0 #000;
}

.navbar-nav .nav-link:hover {
    background-color: rgba(255, 87, 233, 0.582);
}

.navbar-nav .nav-link.active {
    background-color: rgba(255, 87, 233, 0.582);
}

.navbar-brand-container {
    flex-grow: 1;
}

.about-link {
    margin-right: auto;
}


footer {
    background-color: violet;
    color: white;
    font-weight: bold;
}

@keyframes borderAnimation {
0% {
    transform: scaleX(1);
}
100% {
    transform: scaleX(1.1);
}
}

.carousel-container {
margin-top: 90px;
}

.carousel-item img {
height: 500px;
object-fit: cover;
}

::-webkit-scrollbar {
width: 5px;
}

::-webkit-scrollbar-track {
background-color: black;
}

::-webkit-scrollbar-thumb {
  background-image: url("content/gradient.gif");
}

.gif-container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.gif-container img {
    max-width: 80%;
    max-height: 80%;
}

.title {
    text-align: center;
    color: aliceblue;
    font-weight: bold;
}

.title h2 {
    font-size: 50px;
    font-family: 'Poppins', sans-serif;
}

.card-img-top {
    transition: transform 0.3s ease;
}

.card-img-top:hover {
    transform: scale(1.05);
}

.image-hover {
    max-width: 45%;
    height: auto;
    border: 5px solid transparent;
    transition: border-color 0.3s ease, transform 0.3s ease;
}

.image-hover:hover {
    border-color: rgb(255, 0, 0);
    transform: scale(1.1);
}


              .button-container {
      margin-top: 10px;
        }

        .btn {
    display: inline-block;
    padding: 10px 20px;
    border: 2px solid violet;
    border-radius: 10px;
    background-color: transparent;
    color: violet;
    font-weight: bold;
    text-decoration: none;
    transition: all 0.32 ease-in-out;
}

.btn:hover {
    background-color: violet;
    color: white;
}

#carouselExampleInterval {
    max-width: 1000px;
    max-height: 700px;
}

.carousel-item img {
    width: auto;
    height: 100%;
    object-fit: contain;
}

.container-1 {
    display: flex;
    justify-content: center;
    align-items: center;
}
    </style>
  </head>
  <body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <div class="navbar-brand-container">
            <a class="navbar-brand font-weight-bold" href="welcome.php">KANJOY</a>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="newhere.php">Profile</a>
                </li>
            </ul>
        </div>
        <div class="navbar-collapse collapse order-first" id="navbarNavAltMarkup">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link about-link" href="supreewebcode.php">About</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

      <div class="preloader">
        <div class="spinner"></div>
    </div>
    
    <h2 style="margin-bottom: 20px; margin-top: 10vh; text-align: center; color:#E94B3CFF; font-size: 40px;">Something You May Like</h2>
    <div class="container-1 mt-5 d-flex justify-content-center align-items-center">
    <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel" style="max-width: 800px; max-height: 500px;">
        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="10000">
                <img src="content/rtx-post.jpg" class="d-block w-100 rounded-3" alt="...">
            </div>
            <div class="carousel-item" data-bs-interval="2000">
                <img src="content/ram-post.jpg" class="d-block w-100 rounded-3" alt="...">
            </div>
            <div class="carousel-item">
                <img src="content/mobo-rog-post.jpg" class="d-block w-100 rounded-3" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>

<h2 style="margin-bottom: 20px; text-align: center; color: #F2AA4CFF; font-size: 30px; margin-top: 20vh; padding-bottom: 5vh; font-weight: 700;">Welcome To Our Store, Take A Look</h2>
    <div style="background-color: #F2AA4CFF; padding: 20px;">
    <div class="thumbnail d-flex justify-content-center align-items-center" style="margin: 0 20px; padding: 1vh;">
    <img src="content/thumb-A4-1.png" alt="" style="width: 60%; height: auto;">
    <div class="text-container" style="font-family: 'Poppins', sans-serif; color: #101820FF; font-size: 20px; max-width: 40%; padding: 0 20px;">
        <h3 style="margin-left: 15vh;  color: #101820FF; padding-top:30px; padding-bottom:20px; font-family:poppins; font-weight:550;">The RTX 4090</h3>
        <p>NVIDIA® GeForce RTX™ 4090 is the best GeForce GPU. These GPUs deliver major breakthroughs 
            in performance, efficiency, and AI-powered graphics.
        </p>
    </div>
</div>
<div class="desc" style="max-width: 80%; margin: 0 auto; text-align: center; color: #101820FF; font-size:25px; padding-top:50px;">
    <p>Enjoy ultra-high-performance gaming experiences, incredibly detailed virtual worlds, 
        unprecedented productivity, and new ways to create. This graphics card is powered by NVIDIA 
        Ada Lovelace architecture and equipped with 24 GB G6X memory to provide the best experience 
        for gaming fans and content creators.</p>
</div>
</div>

    <div class="desc" style="text-align: center; color: white; padding: 30vh; font-size: 30px; max-width: 80%; margin: 0 auto;">
    <span>You Must Log in To Scroll More</span>
    <a href="login_form.php" class="btn">Press Here</a>
    </div>



            
    <footer class="text-center py-5 mt-5" style="background-color: transparent;">
      <p>&copy; 2024 Supree Web Code Co. All rights reserved.</p>
    </footer>


     <div class="modal" tabindex="-1" id="loginSignupModal">

    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <script src="js/main.js"></script>
    <script>
      window.addEventListener('load', function () {
          document.querySelector('.preloader').style.display = 'none';
      });
    </script>
    <script>
   document.getElementById('profileBtn').addEventListener('click', function(event) {
      event.preventDefault();
      $('#loginSignupModal').modal('show');
   });
</script>
  
  </body>
</html>
