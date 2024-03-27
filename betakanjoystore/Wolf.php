<!doctype html>
  <html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="css/index.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap" rel="stylesheet">
  
    <style>
        .body{
  overflow: hidden;
}

body::-webkit-scrollbar {
  display: none !important; /* Hide the scrollbar */
}

/* Navbar Styling */
.navbar {
  background-color: transparent !important; /* Remove background color */
  margin-top: 25px;
  font-family: 'Oswald', sans-serif; /* Set font */

}

.navbar-brand {
  position: absolute; /* Position the brand */
  left: 50%; /* Center horizontally */
  transform: translateX(-50%); /* Adjust for centering */
  font-weight: bold; /* Make font bold */
  font-size:50px;
  padding: 0px 10px;
  background-color: #000000;
  color: #fcf003;
  transition: 0.2s ease-in-out 0s;
}

.navbar-brand:hover{
  background-color: #fcf003;
  color: #000000;
}

.navbar-nav {
  width: 100%; /* Full width */
  display: flex; /* Use flexbox */
  justify-content: space-between; /* Evenly distribute links */
}

.navbar-nav .nav-item {
  margin: 0 290px ; /* Add margin between links */
}

.navbar-nav .nav-link {
  color: #000000; /* Set text color */
  font-weight: bold; /* Make font bold */
  transition: 0.2s ease-in-out 0s;
  font-size:20px;
}

.navbar-nav .nav-link:hover{
  background-color: #fcf003;
  color:#000000;
  transition: 0.1s ease-in-out 0s;
}

.custom-navbar{
    background: #000000;
  }

  /* Card styling */
.card {
    border: none; /* Remove border */
    background-color: transparent; /* Remove background color */
    position: relative; /* Make sure the overlay is positioned correctly */
    border-radius: 30px;
    overflow: hidden;
    transition: transform 0.3s ease-in-out; /* Add transition for hover effect */
}

.card:hover {
      transform: translateY(-5px); /* Add hover effect */
    }

/* Set text color to white */
.card-title,
.card-text {
    color: white; 
}

.card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(to top, rgba(0,0,0,0.6), rgba(0,0,0,0.9)); /* Adjust opacity and colors as needed */
    border-radius: inherit;
}


.container{
  padding-inline: 175px;
}

.container-1{
  padding-inline: 260px;
}

.text-center{
  padding: 50px 0px;
  font-weight: bold; /* Make font bold */
  font-family: 'Oswald', sans-serif; /* Set font */
  background-color: #000000;
  color: #fcf003;
}

.footer {
  background-color: yellow;
  color: #000;
  padding: 20px 0;
}
.footer .container {
  display: flex;
  align-items: center;
  justify-content: space-between; /* Added */
  max-width: 1200px; /* Added */
  margin: 0 auto; /* Added */
  padding: 0 20px; /* Added */
}
.footer .section {
  text-align: center;
}
.footer .medsos a {
  color: #000;
  margin: 0 10px;
  text-decoration: none;
  font-weight: bold; /* Added */
}
.footer .extra p {
  margin: 0;
}
    </style>
  </head>
  <body>

  <nav class="navbar navbar-expand-lg navbar-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="/index">WOLF G.</a>
    <div class="navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="supreewebcode.php">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/profile">Profile</a>
        </li>
    </div>
  </div>
</nav>

  <div class="container-1 mt-4">
    <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active" data-bs-interval="10000">
          <img src="wolf/gtx-carosel.jpeg" class="d-block w-100 rounded-3" alt="...">
        </div>
        <div class="carousel-item" data-bs-interval="2000">
          <img src="wolf/cpu-carosel.jpeg" class="d-block w-100 rounded-3" alt="...">
        </div>
        <div class="carousel-item">
          <img src="wolf/ram.jpeg" class="d-block w-100 rounded-3" alt="...">
        </div>
        <div class="carousel-item">
          <img src="wolf/mobo.jpeg" class="d-block w-100 rounded-3" alt="...">
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

  <div class="container mt-4">
    <h2 class="text-center mb-4">CATEGORY</h2>
    <div class="row">
        <div class="col-md-4">
            <div class="card" id="index">
                <img src="wolf/cpu-cat.jpeg" class="card-img-top w-100 rounded-5" alt="Image 1">
                <div class="card-img-overlay">
                    <h5 class="card-title">CPU</h5>
                    <p class="card-text">The brain of your computer</p>
                    <div class="d-flex justify-content-between">
                    <a href="/things" class="btn btn-outline-light"><i class="bi bi-heart"></i>Explore</a>
                  </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <img src="wolf/ram-cat.jpeg" class="card-img-top w-100 rounded-5" alt="Image 2">
                <div class="card-img-overlay">
                    <h5 class="card-title">RAM</h5>
                    <p class="card-text">For your computer memory.</p>
                    <div class="d-flex justify-content-between">
                    <a href="/things" class="btn btn-outline-light"><i class="bi bi-heart"></i>Explore</a>
                  </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <img src="wolf/gtx.jpeg" class="card-img-top w-100 rounded-5" alt="Image 3">
                <div class="card-img-overlay">
                    <h5 class="card-title">Graphic Card</h5>
                    <p class="card-text">To display better quality image</p>
                    <div class="d-flex justify-content-between">
                    <a href="/things" class="btn btn-outline-light"><i class="bi bi-heart"></i>Explore</a>
                  </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card mb-3 mt-4">
    <img src="wolf/mobo.jpeg" class="card-img-top" alt="...">
    <div class="card-img-overlay">
                    <h5 class="card-title">Mother Board</h5>
                    <p class="card-text">Without it then WTF are you doin</p>
                    <div class="d-flex justify-content-between">
                    <a href="/things" class="btn btn-outline-light"><i class="bi bi-heart"></i>Explore</a>
    </div>
  </div>
    </div>
  </div>

  <footer class="footer mt-4">
    <div class="container">
        <div class="section copyright">
            <p>&copy; 2024 WOLF G. All rights reserved.</p>
        </div>
        <div class="section medsos">
            <a href="#">Facebook</a>
            <a href="#">Twitter</a>
            <a href="#">Instagram</a>
        </div>
        <div class="section extra">
            <p>Additional Information</p>
        </div>
    </div>
</footer>
                  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
  </html>