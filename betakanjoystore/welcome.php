<?php
session_start();

if(isset($_POST['submit'])){

   @include 'config.php';

   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);

   $select = "SELECT * FROM user_form WHERE email = '$email' AND password = '$pass'";
   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){
      $row = mysqli_fetch_array($result);
      if($row['user_type'] == 'admin'){
         $_SESSION['admin_name'] = $row['name'];
         header('location:admin_page.php');
         exit;
      }elseif($row['user_type'] == 'user'){
         $_SESSION['user_name'] = $row['name'];
         header('location:welcome.php');
         exit;
      }
   }else{
      $error = 'Incorrect email or password!';
      include('login_form.php');
      exit;
   }
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

#carouselExampleInterval {
    max-width: 1000px;
    max-height: 700px;
}

.carousel-item img {
    width: auto;
    height: 60%;
    object-fit: contain;
}

.container-1 {
    display: flex;
    justify-content: center;
    align-items: center;
}

::-webkit-scrollbar-track {
background-color: black;
}

::-webkit-scrollbar-thumb {
  background-image: url("content/gradient.gif");
}

.title {
    text-align: center;
    color: aliceblue;
    font-weight: bold;
    margin-top: 50vh; /* Move the title downward by 50% of the viewport height */
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

.image-selection {
    display: flex;
    justify-content: space-around;
    align-items: center;
    margin-top: 20vh;
    margin-bottom: 30vh;
}

.image-container {
    display: flex; /* Add this line to make it a flex container */
    justify-content: center; /* Align items horizontally */
    align-items: center; /* Align items vertically */
    max-width: 40%;
    color: white;
    font-family: 'Poppins', sans-serif;
    margin-top: 40px; /* Adjust the margin-top value to create space */
    position: relative; /* Add position relative for overlay effect */
}


.content-wrapper {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    text-align: center;
}

.image-container img {
    width: 100%;
    height: auto;
    max-height: 80vh;
    transition: transform 0.3s ease;
}

/* Add a hover effect to the image */
.image-container:hover img {
    transform: scale(1.1);
}

/* Add overlay for text */
.image-container::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5); /* Adjust opacity as needed */
    opacity: 0;
    transition: opacity 0.3s ease;
}

/* Show overlay on hover */
.image-container:hover::before {
    opacity: 1;
}

.image-container h2 {
    position: absolute;
    bottom: 57vh; /* Adjust distance from the top */
    left: 50%;
    transform: translateX(-50%);
    z-index: 1;
    color: white;
    text-align: center;
    font-family: 'Poppins', sans-serif;
    font-size: 24px;
    font-weight: bold;
}

.image-container p {
    position: absolute;
    top: 60vh; /* Adjust distance from the bottom */
    left: 30%;
    transform: translateX(-30%);
    z-index: 1;
    color: white;
    text-align: center;
    font-family: 'Poppins', sans-serif;
    font-size: 16px;
    padding-bottom: 100px;
}

.btn {
    display: inline-block;
    padding: 10px 20px;
    border: 2px solid #F2AA4CFF;
    border-radius: 10px;
    background-color: transparent;
    color: #F2AA4CFF;
    font-weight: bold;
    text-decoration: none;
    transition: all 0.32 ease-in-out;
}

.btn:hover {
    background-color: #E94B3CFF;
    color: white;
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
                    <a class="nav-link" aria-current="page" href="user_page.php">Profile</a>
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

<h2 style="margin-bottom: 20px; text-align: center; color: #F2AA4CFF; font-size: 40px; font-weight: 700; margin-top:15vh;">Intel Highlights</h2>
<div class="video-container d-flex flex-column justify-content-center align-items-center" style="margin: 0 20px; padding: 8vh;">
    <div style="width: 80%; margin-bottom: 20px;">
        <video autoplay loop muted style="width: 100%; height: auto;">
            <source src="content/arc-vid.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>
    <div class="text-container" style="font-family: 'Poppins', sans-serif; color: #F2AA4CFF; font-size: 20px; max-width: 70%; text-align: center; padding-top: 30px;">
        <p>Intel came very late to the party with its desktop graphics cards, 
            so it's not surprising that they feel like a bit of a work in progress compared to 
            veterans like Nvidia and AMD.
        </p>
    </div>
</div>

<div class="thumbnail d-flex justify-content-center align-items-center" style="margin: 0 20px; padding-top: 7vh;">
    <div class="text-container" style="font-family: 'Poppins', sans-serif; color: #F2AA4CFF; font-size: 20px; max-width: 40%; padding: 0 20px;">
        <h3 style="padding: 0 53px;  color: #F2AA4CFF; padding-top:30px; padding-bottom:15px; font-family:poppins; font-weight:550;">Intel® Arc™ Pro A60</h3>
        <p>Introducing the next step in professional GPUs from Intel: the Intel® Arc™ Pro A60 GPU. 
            With built-in light tracing hardware, graphics acceleration, and machine learning 
            capabilities, the Intel® Arc™ Pro A60 GPU brings together fluid viewports, the latest 
            visual technologies, and rich content creation in a standard single-slot form factor.
        </p>
    </div>
    <img src="content/arc-front.png" alt="" style="width: 48%; height: auto;">
</div>
<div class="desc" style="max-width: 80%; margin: 0 auto; text-align: center; color: #F2AA4CFF; font-size:25px; padding-top:80px; padding-bottom: 20vh;">
    <p>For many professional users, Intel is synonymous with years of extensive trust and impressive
        reliability, and this new line of professional graphics is a continuation of all that. 
        You've probably been using Intel integrated graphics for years, which makes the switch to 
        Intel's more advanced, dedicated graphics an obvious choice.
        You might think this is just a new line of GPUs, but to us it means bringing 
        competition and innovation back to your favorite software tools.</p>
</div>

    <div style="background-color: #E94B3CFF; padding: 20px;">
    <h2 style="margin-bottom: 20px; text-align: center; color: #101820FF; font-size: 40px; margin-top: 2vh; padding-bottom:5vh; font-weight: 700;">AMD Radeon™ CPU And GPU</h2>
    <div class="preview" style="display: flex; justify-content: center; padding-top: 30px; padding-bottom: 40px;">
    <img src="content/Sapphire-thumb.png" alt="" style="max-height: 34vh; margin: 0 10px;">
    <img src="content/RYZEN-7.png" alt="" style="max-height: 34vh; margin: 0 10px;">
    <img src="content/pulse_dualx.png" alt="" style="max-height: 34vh; margin: 0 10px;">
</div>
<div class="desc" style="max-width: 80%; margin: 0 auto; text-align: center; color: #101820FF; font-size:25px; padding-top:50px; font-weight: 400;">
    <p>Just like Intel or maybe Intel get inspired by AMD, AMD also making a GPU and cpu
        but AMD making their GPU since 2006 and now they can compete with Nvidia <span style="font-weight: bold;">That They
        say Powerful and now They're on the same level.</span></P>
    </P>
</div>
<div class="desc" style="max-width: 80%; margin: 0 auto; text-align: center; color: #101820FF; font-size: 25px; padding-top: 50px; font-weight: 400; display: flex; flex-direction: column; align-items: center;">
    <img src="content/ryzen5_badge.jpg" alt="Image" style="width: 26%; height: auto; margin-bottom: 70px;">
    <div style="flex: 1;">
        <p><span style="font-weight: bold;">Only AMD Ryzen™ processors feature models with exclusive AMD 3D V-Cache™</span> technology 
            for a massive gaming performance boost.4 AMD combines its top-end Ryzen 7000X3D series 
            processors, with up to a colossal 144MB of on-chip memory, paired with the most advanced 
            processor cores you can get in a gaming PC so enthusiasts can harness the power of the 
            ultimate gaming and creator performance in one chip.5 No workload is off limits with 
            AMD Ryzen processors.
        </p>
    </div>
</div>

</div>

<div class="image-selection">
    <div class="image-container">
        <h2>Power Supply</h2>
        <img src="content/layar-putih.png" alt="" class="image" onmouseover="this.src='content/layar-hitam.png'" onmouseout="this.src='content/layar-putih.png'">
        <p>CORSAIR CX-550F RGB Series fully modular power supplies deliver reliable 80 PLUS Bronze efficient power to your system, alongside vibrant customizable lighting from a 120mm RGB fan and a clean aesthetic.</p>
    </div>
    <div class="image-container">
        <h2>Casing</h2>
        <img src="content/lianli-putih.png" alt="" class="image" onmouseover="this.src='content/lianli-hitam.png'" onmouseout="this.src='content/lianli-putih.png'">
        <p>The LANCOOL 216 is a mainstream case that features all-around mesh panels for optimal airflow. Thanks to its modular rear panel, it can be optimized for air cooling or water cooling. It includes 2 x 160mm and 1 x 140mm pre-installed PWM fans and an innovative rear PCIe fan bracket to maximize airflow.</p>
    </div>
</div>

    <div class="desc" style="text-align: center; color: white; padding-top: 30vh; padding-bottom: 20vh; font-size: 30px; max-width: 80%; margin: 0 auto;">
    <span>Wanna Go Back Or Discover The Content Press "This Button" To Go Up</span>
    <a href="#" class="btn" onclick="scrollToTop()">This Button</a>
    </div>

    <h2 style="margin-bottom: 20px; text-align: center; color: white; font-size: 40px; margin-top: 2vh; padding-bottom:5vh; font-weight: 700;">Here Some Content For You</h2>

    <h2 style="margin-bottom: 90px; margin-top: 50px; text-align: center; color: white; font-size: 40px; font-family: poppins; font-style: italic;">High End Part</h2>

    <div class="container">
    <div class="row mt-5 justify-content-center" style="margin-bottom: 20px;">
        <div class="col-md-3">
            <div class="card mb-3 border-0 text-center" style="background-color: rgba(255, 255, 255, 0);">
                <a href="mobo-rec.php">
                    <img src="Content/h525.png" class="card-img-top" alt="...">
                </a>
                <div class="card-body">
                    <h4 class="card-title font-weight-bold fs-2 text-white">Motherboard</h4>
                    <p class="card-text font-weight-regular fs-4 text-white">Here Some Mobo Recommend For You</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card mb-3 border-0 text-center" style="background-color: rgba(255, 255, 255, 0);">
                <a href="ssd-rec.php">
                    <img src="Content/ssd-front.png" class="card-img-top" alt="...">
                </a>
                <div class="card-body">
                    <h4 class="card-title font-weight-bold fs-2 text-white">SSD For you</h4>
                    <p class="card-text font-weight-bold fs-4 text-white">Here Some SSD Recommend For You</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card mb-3 border-0 text-center" style="background-color: rgba(255, 255, 255, 0);">
               <a href="graphic-rec.php"> 
              <img src="Content/asus-rtx.png" class="card-img-top" alt="...">
              </a>
                <div class="card-body">
                    <h4 class="card-title font-weight-bold fs-2 text-white">Graphic Card</h4>
                    <p class="card-text font-weight-bold fs-4 text-white">Here Some Graphics Card Recommend For You</p>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="copyright-kerajaan" style="display: flex; justify-content: center; align-items: center; height: 50vh; padding-top: 68vh;">
    <img src="content/copyright-kerajaan.png" alt="copyright PNG" style="width: 10%; height: auto;">
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