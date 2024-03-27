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

    $sql = "INSERT INTO comments (name, email, comment) VALUES ('$name', '$email', '$comment')";

    if ($conn->query($sql) === TRUE) {
        // Retrieve the ID of the last inserted comment
        $last_id = $conn->insert_id;

        // Fetch the newly added comment
        $sql = "SELECT name, email, comment, created_at FROM comments WHERE id = $last_id";
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
$sql = "SELECT name, email, comment, created_at FROM comments";
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
        .navbar {
        background-color: transparent !important;
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
    border: 2px solid sandybrown;
    border-radius: 10px;
    background-color: transparent;
    color: sandybrown;
    font-weight: bold;
    text-decoration: none;
    transition: all 0.32 ease-in-out;
}

.btn:hover {
    background-color: sandybrown;
    color: white;
}

form {
    text-align: center;
}

/* Adjust the position of the comments */
#comment {
    margin: 0 auto; /* Center the input horizontally */
    display: block; /* Ensure the input takes full width */
}


/* Style the input field */
#comment {
    width: 100vh; /* Adjust the width as needed */
    border: none; /* Remove border */
    border-bottom: 2px solid sandybrown; /* Add purple underline */
    background-color: transparent; /* Transparent background */
    color: black; /* Text color */
    font-family: 'Poppins', sans-serif; /* Set font family */
    font-size: 16px; /* Set font size */
    margin-bottom: 20px; /* Add some space below the input field */
}

.comment {
    margin-bottom: 20px;
    padding: 10px;
    border-radius: 5px;
    background-color: transparent;
    color: black;
    padding-left: 30px; /* Add padding to the left side */
}

/* Style the submit button */
form button[type="submit"] {
    padding: 10px 20px;
    color: sandybrown; /* Text color white */
    border: 2px solid sandybrown; /* Purple border */
    border-radius: 5px;
    cursor: pointer;
    background-color: transparent; /* Transparent background */
    font-family: 'Poppins', sans-serif; /* Use Poppins font */
    transition: background-color 0.3s, color 0.3s; /* Transition for background color and text color */
}

form button[type="submit"]:hover {
    background-color: sandybrown; /* Purple background on hover */
    color: white; /* White text on hover */
}

    </style>
</head>
<body style="background-color: #F5C7B8FF; color: white;">

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

<div class="container d-flex justify-content-center align-items-center" style="height: 55vh;">
    <div class="card text-center" style="width: 18rem; background-color: transparent; border: none; margin-bottom: 10px;">
        <img src="content/aura-pd-pg.png" class="card-img-top" alt="..." style="margin-bottom: 20px; max-width: 400px;">
    </div>
</div>

<div class="desc" style="text-align: center; color: black; padding: 3vh 0; font-size: 25px; max-width: 70%; margin: 0 auto;">
    <h2 style="margin-bottom: 20px;">ROG Maximus Z790 Formula</h2>
    <p>Tuning is now faster and smarter than ever before. ASUS AI Overclocking profiles 
        the CPU and cooling to predict the optimal configuration and push the system to its 
        limits. Predicted values can be engaged automatically or used as a launching ground 
        for further experimentation.
    </p>
</div>

<div class="video-container d-flex justify-content-center align-items-center" style="margin: 0 20px; padding: 8vh;">
    <video autoplay loop muted style="width: 40%; height: auto;">
        <source src="content/Asus-ad.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>
    <div class="text-container" style="font-family: 'Poppins', sans-serif; color: black; font-size: 20px; max-width: 40%; padding: 0 20px;">
        <p>HYBRIDCHILL
        The ASUS HybridChill water block leverages a fusion of passive and liquid cooling to achieve 
        highly 
        efficient VRM operation.</p>
    </div>
</div>

<div class="desc" style="text-align: center; color: black; padding: 10vh; font-size: 30px; max-width: 70%; margin: 0 auto;">
        <p>All that things is also not to cheap it can cost you</p>
        <span style="font-weight: 700; color: sandybrown;">Rp13.XXX.XXX</span>
        <div class="button-container">
        <a href="https://www.tokopedia.com/cockomputer/asus-rog-maximus-z790-formula?utm_source=google&utm_medium=organic&utm_campaign=pdp-seo" class="btn">Buy Now</a>
        </div>
        </div>


    <div class="container d-flex justify-content-center align-items-center" style="height: 55vh;">
    <div class="card text-center" style="width: 18rem; background-color: transparent; border: none; margin-bottom: 10px;">
        <img src="content/gigabyte-z.png" class="card-img-top" alt="..." style="margin-bottom: 20px; max-width: 400px;">
    </div>
</div>

<div class="desc" style="text-align: center; color: black; padding: 3vh 0; font-size: 25px; max-width: 70%; margin: 0 auto;">
    <h2 style="margin-bottom: 20px;">Z790 AORUS PRO X</h2>
    <p>X marks the 14th generation! Introducing the AORUS Z790 X Gen Motherboards, the most powerful 
        platforms ever built for the Intel® Core™ 14th Gen processors. With the leading performance 
        in DDR5 memory, the upgraded DIY-friendly innovations, and the all-new BIOS redesigned as 
        user-centered, the AORUS Z790 X Gen Motherboards are built to fully unleash the next-gen 
        power.
    </p>
</div>

<div class="video-container d-flex justify-content-center align-items-center" style="margin: 0 20px; padding: 8vh;">
    <div class="text-container" style="font-family: 'Poppins', sans-serif; color: black; font-size: 20px; max-width: 40%; padding: 0 20px; text-align: left;">
        <p>GIGABYTE is committed to enabling the unparalleled performance of the Intel® Core™ 14th Gen processors. </p>
    </div>
    <video autoplay loop muted style="width: 40%; height: auto;">
        <source src="content/gigabyte-ad.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>
</div>



<div class="desc" style="text-align: center; color: black; padding: 10vh; font-size: 30px; max-width: 70%; margin: 0 auto;">
        <p>This Is pretty much cheaper its only cost you</p>
        <span style="font-weight: 700; color: sandybrown;">Rp8.XXX.XXX</span>
        <div class="button-container">
        <a href="https://www.tokopedia.com/cockomputer/gigabyte-z790-aorus-pro-x?extParam=src%3Dshop%26whid%3D3932314" class="btn">Buy Now</a>
        </div>
    </div>

    <div class="container d-flex justify-content-center align-items-center" style="height: 55vh;">
    <div class="card text-center" style="width: 18rem; background-color: transparent; border: none; margin-bottom: 10px;">
        <img src="content/msi-b.png" class="card-img-top" alt="..." style="margin-bottom: 20px; max-width: 400px;">
    </div>
</div>

<div class="desc" style="text-align: center; color: black; padding: 3vh 0; font-size: 25px; max-width: 70%; margin: 0 auto;">
    <h2 style="margin-bottom: 20px;">MSI MPG B650 EDGE WIFI</h2>
    <p>The MPG series presents fashionable products that show a very unique style and express 
    interest in the challenges of the gaming world. With exceptional performance and style, 
    the MPG series defines the future of gaming fashion.</p>
</div>

<div class="video-container d-flex justify-content-center align-items-center" style="margin: 0 20px; padding: 8vh;">
    <video autoplay loop muted style="width: 40%; height: auto;">
        <source src="content/msi-ad.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>
    <div class="text-container" style="font-family: 'Poppins', sans-serif; color: black; font-size: 20px; max-width: 40%; padding: 0 20px;">
        <p>
        MSI PCI Express Steel Armor slots are protected on the motherboard with extra solder points 
        and can support the weight of heavy graphics cards.
        </p>
    </div>
</div>

<div class="desc" style="text-align: center; color: black; padding: 10vh; font-size: 30px; max-width: 70%; margin: 0 auto;">
        <p>This one is Alot Cheaper Than All that, Its only</p>
        <span style="font-weight: 700; color: sandybrown;">Rp5.XXX.XXX</span>
        <div class="button-container">
        <a href="https://www.tokopedia.com/tokoexpert/msi-mpg-b650-edge-wifi-socket-am5?utm_source=google&utm_medium=organic&utm_campaign=pdp-seo" class="btn">Buy Now</a>
        </div>
        </div>

        <div class="container d-flex justify-content-center align-items-center" style="height: 55vh;">
    <div class="card text-center" style="width: 18rem; background-color: transparent; border: none; margin-bottom: 10px;">
        <img src="content/Asrock-mobo.png" class="card-img-top" alt="..." style="margin-bottom: 20px; max-width: 400px;">
    </div>
</div>

<div class="desc" style="text-align: center; color: black; padding: 3vh 0; font-size: 25px; max-width: 70%; margin: 0 auto;">
    <h2 style="margin-bottom: 20px;">B650 Steel Legend WiFi</h2>
    <p>Steel Legend represents the philosophical state of rock-solid durability and irresistible 
        aesthetics. Built around most demanding specs and features, the Steel Legend series aims at 
        daily users and mainstream enthusiasts! Providing a strong array of materials/components to 
        ensure a stable and reliable performance.
    </p>
</div>

<div class="video-container d-flex justify-content-center align-items-center" style="margin: 0 20px; padding: 8vh;">
    <div class="text-container" style="font-family: 'Poppins', sans-serif; color: black; font-size: 20px; max-width: 40%; padding: 0 20px; text-align: left;">
        <p>Compares to conventional DIP style PCIe slot, the SMT type PCIe slot improves signal flow 
            and maximize stability under high speed, a key breakthrough to fully support the
            lighting speed of the latest PCIe 5.0 standard.</p>
    </div>
    <video autoplay loop muted style="width: 40%; height: auto;">
        <source src="content/asrock-care.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>
</div>



<div class="desc" style="text-align: center; color: black; padding: 10vh; font-size: 30px; max-width: 70%; margin: 0 auto;">
        <p>This Motherboard is Way Way Cheaper than the other only</p>
        <span style="font-weight: 700; color: sandybrown;">Rp4.XXX.XXX</span>
        <div class="button-container">
        <a href="https://www.tokopedia.com/ascaryacomputer-1/asrock-b650e-steel-legend-wifi-motherboard-amd-b650-ryzen-am5" class="btn">Buy Now</a>
        </div>
    </div>

    <div class="desc" style="text-align: center; color: black; padding: 30vh; font-size: 30px; max-width: 80%; margin: 0 auto;">
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
    } else {
        echo "No comments yet.";
    }
    ?>
</div>


<footer class="text-center py-3 mt-5" style="background-color: transparent">
    <p>&copy; 2024 Supree Web Code Co. All rights reserved.</p>
</footer>

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