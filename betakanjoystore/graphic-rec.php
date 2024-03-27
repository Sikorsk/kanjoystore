<?php
session_start(); // Start the session to access session variables

$servername = "localhost"; // Change this if your database is hosted elsewhere
$username = "root"; // Your database username
$password = ""; // Your database password
$database = "user_db"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = isset($_SESSION['user_name']) ? $_SESSION['user_name'] : ''; // Use $_SESSION['user_name'] directly for consistency
    $email = isset($_SESSION['email']) ? $_SESSION['email'] : ''; // Check if email is set
    $comment = $_POST['comment'];

    $sql = "INSERT INTO `comments-mobo` (name, email, comment) VALUES ('$name', '$email', '$comment')";

    if ($conn->query($sql) === TRUE) {
        // Retrieve the ID of the last inserted comment
        $last_id = $conn->insert_id;

        // Fetch the newly added comment
        $sql = "SELECT name, email, comment, created_at FROM `comments-mobo` WHERE id = $last_id";
        $result = $conn->query($sql);

        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo "<div class='comment'>";
            echo "<p><strong>" . $row["name"] . "</strong> on " . $row["created_at"] . "</p>";
            echo "<p>" . $row["comment"] . "</p>";
            echo "</div>";
        } else {
            echo "Error: Comment not found";
        }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    exit(); // Terminate further execution after processing the form
}

// Fetch existing comments
$sql = "SELECT name, email, comment, created_at FROM `comments-mobo`";
$result = $conn->query($sql);

?>

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


        .stroke-text {
            -webkit-text-stroke: 2px black;
            -webkit-text-stroke: 2px #070707;
            -webkit-text-fill-color: white;
            color: white;
        }

        .card-body {
        margin: 0 auto;
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
        background-image: url("content/gradient.gif");
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

form {
    text-align: center;
}

#comment {
    margin: 0 auto;
    display: block;
}

#comment {
    width: 100vh;
    border: none;
    border-bottom: 2px solid #af47ff;
    background-color: transparent;
    color: white;
    font-family: 'Poppins', sans-serif;
    font-size: 16px;
    margin-bottom: 20px;
}

.comment {
    margin-bottom: 20px;
    padding: 10px;
    border-radius: 5px;
    background-color: transparent;
    color: white;
    padding-left: 30px;
}


form button[type="submit"] {
    padding: 10px 20px;
    color: white;
    border: 2px solid #af47ff;
    border-radius: 5px;
    cursor: pointer;
    background-color: transparent;
    font-family: 'Poppins', sans-serif;
    transition: background-color 0.3s, color 0.3s;
}

form button[type="submit"]:hover {
    background-color: #af47ff;
    color: white;
}
    </style>
</head>
<body style="background-color: black; color: white;">

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

<h2 style="margin-bottom: 90px; text-align: center; color: white; font-size: 45px; margin-top:20vh;">GeForce RTX™ 4060 Ti AERO OC 16G</h2>
<center>
    <div style="display: inline-block; margin-right: 10px; margin-top: 70px; margin-bottom: 100px;">
        <img src="content/gg-depan.png" alt="" style="width: 80vh;">
    </div>
    <div style="display: inline-block;">
        <img src="content/gg-back.png" alt="" style="width: 80vh;">
    </div>
</center>


<div class="desc" style="text-align: center; color: white; padding: 3vh 0; font-size: 25px; max-width: 70%; margin: 0 auto;">
    <p>New Streaming Multiprocessors
        Up to 2x performance and power efficiency
        Fourth-Gen Tensor CoresUp to 4x performance with DLSS 3
        vs. brute-force renderingThird-Gen RT CoresUp to 2x ray tracing performance
    </p>
</div>

<h2 style="margin-bottom: 20px; margin-top: 30px; text-align: center; color: white; font-size: 40px;">Preview</h2>
<div class="preview" style="display: flex; justify-content: center; padding-top: 30px; padding-bottom: 40px;">
    <img src="content/gg-car1.jpg" alt="" style="max-height: 28vh; margin: 0 10px;">
    <img src="content/gg-car2.jpg" alt="" style="max-height: 28vh; margin: 0 10px;">
    <img src="content/gg-car3.jpg" alt="" style="max-height: 28vh; margin: 0 10px;">
</div>


<div class="video-container d-flex justify-content-center align-items-center" style="margin: 0 20px; padding: 8vh;">
    <video autoplay loop muted style="width: 60%; height: auto;">
        <source src="content/gigabyte aero rtx 4060.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>
    <div class="text-container" style="font-family: 'Poppins', sans-serif; color: white; font-size: 20px; max-width: 40%; padding: 0 20px;">
        <p>WINDFORCE COOLING SYSTEM
            The WINDFORCE cooling system features three 80mm unique blade fans, alternate spinning, 
            4 composite copper heat pipes directly touch the GPU, 3D active fans and Screen cooling, 
            which together provide high efficiency heat dissipation.
        </p>
    </div>
</div>

<div class="desc" style="text-align: center; color: white; padding: 10vh; font-size: 30px; max-width: 70%; margin: 0 auto;">
        <p>This Is Our Reference For The Price</p>
        <span style="font-weight: 700; color: violet;">Rp8.XXX.XXX</span>
        <div class="button-container">
        <a href="https://www.tokopedia.com/tokoexpert/gigabyte-geforce-rtx-4060-ti-aero-oc-16gb-gddr6" class="btn">Buy Now</a>
        </div>
        </div>


<h2 style="margin-bottom: 90px; text-align: center; color: white; font-size: 45px; margin-top:50px;">AMD Radeon™ RX 7900 XTX Taichi White 24GB OC</h2>
<center>
    <div style="display: inline-block; margin-right: 10px; margin-top: 70px; margin-bottom: 100px;">
        <img src="content/asrock-front.png" alt="" style="width: 80vh;">
    </div>
    <div style="display: inline-block;">
        <img src="content/asrock-back.png" alt="" style="width: 80vh;">
    </div>
</center>

<div class="desc" style="text-align: center; color: white; padding: 3vh 0; font-size: 25px; max-width: 70%; margin: 0 auto;">
    <p>Boost Clock is the maximum frequency achievable on the GPU running a bursty workload. Boost
        clock achievability, frequency, and sustainability will vary based on several factors, 
        including but not limited to: thermal conditions and variation in applications and workloads.
    </p>
</div>

<div class="video-container d-flex justify-content-center align-items-center" style="margin: 0 20px; padding: 8vh;">
    <div class="text-container" style="font-family: 'Poppins', sans-serif; color: white; font-size: 20px; max-width: 40%; padding: 0 20px; text-align: left;">
        <p>Game Clock is the expected GPU clock when running typical gaming applications, 
            set to typical TGP (Total Graphics Power). Actual individual game clock results may vary.</p>
    </div>

    <video autoplay loop muted style="width: 60%; height: auto;">
        <source src="content/asrock-vga.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>
</div>

<h2 style="margin-bottom: 20px; margin-top: 30px; text-align: center; color: white; font-size: 40px;">There's Two Variant Of These</h2>
<div style="display: flex; justify-content: center; padding-top: 20px; padding-bottom: 40px;">
    <div style="width: 100%;">
        <img src="content/asrock-car1.jpg" alt="" style="width: 100%;">
        <img src="content/asrock-car2.jpg" alt="" style="width: 100%;">
    </div>
</div>

<div class="desc" style="text-align: center; color: white; padding: 10vh; font-size: 30px; max-width: 70%; margin: 0 auto;">
        <p>This Is The Price Range</p>
        <span style="font-weight: 700; color: violet;">Rp19.XXX.XXX</span>
        <div class="button-container">
        <a href="https://www.tokopedia.com/aofficial-14/asrock-amd-radeon-rx-7900-xtx-taichi-white-24gb-gddr6-white-edition?utm_source=google&utm_medium=organic&utm_campaign=pdp-seo" class="btn">Buy Now</a>
        </div>
    </div>

    <h2 style="margin-bottom: 90px; text-align: center; color: white; font-size: 45px; margin-top:50px;">Intel® Arc™ Pro A750 Graphics</h2>
<center>
    <div style="display: inline-block; margin-right: 10px; margin-top: 70px; margin-bottom: 100px;">
        <img src="content/arc-front-750.png" alt="" style="width: 80vh;">
    </div>
</center>

<div class="desc" style="text-align: center; color: white; padding: 3vh 0; font-size: 25px; max-width: 70%; margin: 0 auto;">
    <p> From a price and specs perspective, the A750 competes with Nvidia's budget GeForce RTX 3050,
        which also falls roughly into the $250 to $300 price band. Intel dropped the price from $300 
        to $250 in February, but the market doesn't seem to have totally caught up with that yet.</p>
</div>

<div class="video-container d-flex justify-content-center align-items-center" style="margin: 0 20px; padding: 8vh;">
    <video autoplay loop muted style="width: 60%; height: auto;">
        <source src="content/arc-vid.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>
    <div class="text-container" style="font-family: 'Poppins', sans-serif; color: wwhite; font-size: 20px; max-width: 40%; padding: 0 20px;">
        <p>Intel came very late to the party with its desktop graphics cards, 
            so it's not surprising that they feel like a bit of a work in progress compared to 
            veterans like Nvidia and AMD.
        </p>
    </div>
</div>

<div class="desc" style="text-align: center; color: white; padding: 10vh; font-size: 30px; max-width: 70%; margin: 0 auto;">
        <p>We Only Can Found The Price In Euro</p>
        <span style="font-weight: 700; color: violet;">£280.73</span>
        <div class="button-container">
        <a href="https://www.amazon.co.uk/Intel-21P02J00BA-Arc-A750-Graphics/dp/B0BNYXRTFN" class="btn">Buy Now</a>
        </div>
        </div>

    <div class="desc" style="text-align: center; color: white; padding: 30vh; font-size: 30px; max-width: 80%; margin: 0 auto;">
    <span>You read them all?</span>
    <a href="#" class="btn" onclick="scrollToTop()">Press To Go Up</a>
    </div>

    <form id="comment-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <h1><span><?php echo $_SESSION['user_name']; ?></span></h1>
    <!-- Input field for the name -->
    <input type="hidden" name="name" value="<?php echo $_SESSION['user_name']; ?>">
    
    <label for="comment">Comment:</label><br>
    <textarea id="comment" name="comment" rows="4" required></textarea><br>

    <button type="submit">Submit</button>
</form>

<div id="comments">
    <?php
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<div class='comment'>";
            echo "<p><strong>" . $row["name"] . "</strong> on " . $row["created_at"] . "</p>";
            echo "<p>" . $row["comment"] . "</p>";
            echo "</div>";
        }
    }
    ?>
</div>


<footer class="text-center py-3 mt-5" style="background-color: transparent">
    <p>&copy; 2024 Supree Web Code Co. All rights reserved.</p>
</footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <script src="js/main.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Select the comment form
    const commentForm = document.getElementById('comment-form');

    // Add form submission event listener
    commentForm.addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent default form submission

        // Serialize form data
        const formData = new FormData(commentForm);

        // Send AJAX request to the server
        fetch(commentForm.getAttribute('action'), {
            method: 'POST',
            body: formData
        })
        .then(response => {
            if (response.ok) {
                return response.text();
            } else {
                throw new Error('Network response was not ok');
            }
        })
        .then(data => {
            // Append the new comment to the comments section
            document.getElementById('comments').insertAdjacentHTML('afterbegin', data);
            // Clear the comment textarea
            document.getElementById('comment').value = '';
        })
        .catch(error => console.error('Error:', error));
    });
});
</script>
</body>
</html>

<?php
$conn->close();
?>