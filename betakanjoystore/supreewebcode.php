<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KANJOYSTORE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <style>
        .navbar {
        background-color: transparent !important;
        }

        .navbar-brand-wrapper {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        }

        .navbar-brand {
        margin-right: 30vh;
        margin-top: 5vh;
        font-size: 50px;
        transition: color 0.3s ease;
        }

        .navbar-brand:nth-child(2) {
        margin-right: 0;
        }

        .navbar-brand:nth-child(1) {
        font-family: 'Poppins', sans-serif;
        font-weight: bold;
        font-style: italic;
        }

        .navbar-brand:nth-child(2) {
        font-weight: bold;
        color: black;
        background-color: yellow;
        padding: 8px 16px;
        border: none;
        transition: color 0.3s ease, background-color 0.3s ease;
        }

        .navbar-brand:hover {
        color: palegreen;
        }

        .navbar-brand:nth-child(2):hover {
        background-color: black;
        color: yellow;
        }

        .stroke-text {
            -webkit-text-stroke: 2px black;
            -webkit-text-stroke: 2px #070707;
            -webkit-text-fill-color: white;
            color: white;
        }

        .card-body {
        margin: 10vh;
        }

        .video-container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 20px;
        }

        .text-container {
         margin-left: 20px;
        text-align: center;
        }

        ::-webkit-scrollbar {
        width: 5px;
        }

        ::-webkit-scrollbar-track {
        background: black;
        }

        ::-webkit-scrollbar-thumb {
        background-color: #070707;
        }


.btn:hover {
    background-color: sandybrown;
    color: white;
}

.card-img-top {
    transition: transform 0.3s ease;
}

.card-img-top:hover {
    transform: scale(1.05);
}



    </style>
</head>
<body style="background-color: #e6d07a; color: black;">

<div style="display: flex; justify-content: center; align-items: center; height: 50vh; margin-bottom: -18vh;">
    <img src="Content/Slogo.png" alt="" style="max-width: 50%; max-height: 50%;">
</div>


<div class="desc" style="text-align: center; color: black; padding: 10px; font-size: 40px; max-width: 80%; margin: 10vh auto; font-weight: bold;">
    <h3 style="font-weight: bold; font-size: 50px;">About Supree Web Code Co.</h3>
</div>


<div class="container">
    <div class="row mt-5 justify-content-center">
        <div class="col-md-4">
            <div class="card mb-3 border-0 text-center" style="background-color: rgba(255, 255, 255, 0);">
                <img src="Content/proper-me.jpg" class="card-img-top" alt="...">
                <div class="card-body d-flex flex-column justify-content-center align-items-center">
                    <h4 class="card-title font-weight-bold fs-2 text-black">Wahyu</h4>
                    <p class="card-text font-weight-regular fs-3 text-black" style="width: 400px;">When the group AFK
                      He decide to be group carrier end up being hated, Developer of KANJOY Store
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-5 border-0 text-center" style="background-color: rgba(255, 255, 255, 0);">
                <img src="Content/proper-abdul.jpg" class="card-img-top" alt="...">
                <div class="card-body d-flex flex-column justify-content-center align-items-center">
                    <h4 class="card-title font-weight-bold fs-2 text-black">Qowwiy</h4>
                    <p class="card-text font-weight-bold fs-3 text-black" style="width: 400px;">He's a multitasking enjoyer
                        always do everything by himself and good at fullstack mf, Developer of WOLF
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-3 border-0 text-center" style="background-color: rgba(255, 255, 255, 0);">
                <img src="Content/proper-farizky.jpg" class="card-img-top" alt="...">
                <div class="card-body d-flex flex-column justify-content-center align-items-center">
                    <h4 class="card-title font-weight-bold fs-2 text-black">Farizky</h4>
                    <p class="card-text font-weight-bold fs-3 text-black" style="width: 400px;">Sosok Asli Atmin🤑🥶🥵😨</p>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="desc" style="text-align: center; color: black; padding: 10px; font-size: 40px; max-width: 80%; margin: 5vh auto; font-weight: bold;">
    <h2>More Website We Made</h2>
</div>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <div class="navbar-brand-wrapper">
            <a class="navbar-brand font-weight-bold" href="welcome.php">KANJOY</a>
            <a class="navbar-brand font-weight-bold" href="wolf.php">WOLF G.</a>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</nav>

<div class="copyright-kerajaan" style="display: flex; justify-content: center; align-items: center; height: 50vh; padding-top: 50vh;">
    <img src="content/copyright-kerajaan.png" alt="copyright PNG" style="width: 10%; height: auto;">
    </div>


    <footer class="text-center py-5 mt-5" style="background-color: transparent;">
      <p>&copy; 2024 Supree Web Code Co. All rights reserved.</p>
    </footer>

</body>
</html>