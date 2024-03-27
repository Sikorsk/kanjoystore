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

    $sql = "INSERT INTO `comments-ssd` (name, email, comment) VALUES ('$name', '$email', '$comment')";

    if ($conn->query($sql) === TRUE) {
        // Retrieve the ID of the last inserted comment
        $last_id = $conn->insert_id;

        // Fetch the newly added comment
        $sql = "SELECT name, email, comment, created_at FROM `comments-ssd` WHERE id = $last_id";
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
$sql = "SELECT name, email, comment, created_at FROM `comments-ssd`";
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
        display: none !important;
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
    border: 2px solid #af47ff;
    border-radius: 10px;
    background-color: transparent;
    color: #af47ff;
    font-weight: bold;
    text-decoration: none;
    transition: all 0.32 ease-in-out;
}

.btn:hover {
    background-color: #af47ff;
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
<body style="background-color: #10101c; color: white;">

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

<div class="image-container d-flex justify-content-center align-items-center" style="margin: 0 20px; padding: 8vh;">
    <img src="content/kyo-ssd.png" style="width: 40%; height: auto;">

<div class="text-container" style="font-family: 'Poppins', sans-serif; color: whitex; font-size: 20px; max-width: 40%; padding: 0 20px;">
    <h2 style="margin-bottom: 20px; font-weight: 700;">KYO ULTIMATE K7000 PCIe 4.0 NVME SSD 512GB M.2 NVMe Gen 4 x4</h2>
        <p>After releasing its best seller product, namely the KYO Kaizen Series, KYO has again released 
        the NEWEST NVMe SSD, namely the KYO ULTIMATE K7000 with PCIe Gen 4×4, which is one of the 
        fastest NVMe SSDs in the world with a READ speed of up to: 7500 (2TB CAPACITY).</p>
    </div>
</div>


<div class="desc" style="text-align: center; color: white; padding: 10vh; font-size: 30px; max-width: 70%; margin: 0 auto;">
        <p>The price are very Friendly They only Cost around</p>
        <span style="font-weight: 700; color: #af47ff;">Rp500.000-600.000</span>
        <div class="button-container">
        <a href="https://www.tokopedia.com/kyo-official/ssd-kyo-kaizen-m-2-nvme-512gb-pcie-gen3-x4-2280-ssd-nvme-gen-3?extParam=ivf%3Dfalse%26src%3Dsearch&refined=true" class="btn">Buy Now</a>
        </div>
        </div>


        <div class="image-container d-flex justify-content-center align-items-center" style="margin: 0 20px; padding: 8vh;">
    <img src="content/da-d-ssd.png" style="width: 40%; height: auto;">

<div class="text-container" style="font-family: 'Poppins', sans-serif; color: whitex; font-size: 20px; max-width: 40%; padding: 0 20px;">
    <h2 style="margin-bottom: 20px; font-weight: 700;">Digital Alliance Pro NVMe M.2</h2>
        <p>Not much description from this SSD but all i know this SSD quite nice and durable
        the storage is 512Gb and also the heatsink kinda cool.</p>
    </div>
</div>


<div class="desc" style="text-align: center; color: white; padding: 10vh; font-size: 30px; max-width: 70%; margin: 0 auto;">
        <p>This one is Cheaper than the previous SSD Only</p>
        <span style="font-weight: 700; color: #af47ff;">Rp490.000</span>
        <div class="button-container">
        <a href="https://www.tokopedia.com/blessingcombali/ssd-digital-alliance-pro-nvme-m-2-3d-nand-pcie-gen3x4-512gb?utm_source=google&utm_medium=organic&utm_campaign=pdp-seo" class="btn">Buy Now</a>
        </div>
    </div>


        <div class="image-container d-flex justify-content-center align-items-center" style="margin: 0 20px; padding: 8vh;">
    <img src="content/team-ssd.png" style="width: 40%; height: auto;">
    
    <div class="text-container" style="font-family: 'Poppins', sans-serif; color: whitex; font-size: 20px; max-width: 40%; padding: 0 20px;">
    <h2 style="margin-bottom: 20px; font-weight: 700;">MP33 PRO M.2 PCIe SSD</h2>
        <p>Once you've used the high-speed PCIe, you will never go back
        High-speed reading and writing for more efficiency
        Stable and durable- Not only fast, but reliable
        Up to 2TB of storage capacity
        Five year warranty providing customers with peace of mind.</p>
    </div>
</div>

<div class="desc" style="text-align: center; color: white; padding: 10vh; font-size: 30px; max-width: 70%; margin: 0 auto;">
        <p>This one a little expensive because its 2TB</p>
        <span style="font-weight: 700; color: #af47ff;">Rp1.710.000</span>
        <div class="button-container">
        <a href="https://www.tokopedia.com/tokoexpert/ssd-team-mp33-m-2-2280-nvme-2tb-pcie-gen3-x4?extParam=ivf%3Dfalse%26src%3Dsearch" class="btn">Buy Now</a>
        </div>
        </div>


        <div class="image-container d-flex justify-content-center align-items-center" style="margin: 0 20px; padding: 8vh;">
    <img src="content/samsung-ssd.png" style="width: 40%; height: auto;">

    <div class="text-container" style="font-family: 'Poppins', sans-serif; color: whitex; font-size: 20px; max-width: 40%; padding: 0 20px;">
    <h2 style="margin-bottom: 20px; font-weight: 700;">SAMSUNG 980 PRO SSD with Heatsink 1TB</h2>
        <p>ADOBE MEMBERSHIP: Get a two-month membership of Adobe Creative Cloud Photography plan on us when you purchase and register an 
            eligible 1TB or 2TB Samsung SSD*.Specific uses: Gaming.Operating Temperature : 0 - 70 ℃ Operating Temperature.</p>
    </div>
</div>

<div class="desc" style="text-align: center; color: white; padding: 10vh; font-size: 30px; max-width: 70%; margin: 0 auto;">
        <p>This is good like its the top tier only for</p>
        <span style="font-weight: 700; color: #af47ff;">$99.99</span>
        <div class="button-container">
        <a href="https://www.amazon.com/Electronics-Heatsink-Internal-Compatible-MZ-V8P1T0CW/dp/B09JHL33X7?th=1" class="btn">Buy Now</a>
        </div>
        </div>


        <div class="image-container d-flex justify-content-center align-items-center" style="margin: 0 20px; padding: 8vh;">
    <img src="content/adata-ssd.png" style="width: 40%; height: auto;">

    <div class="text-container" style="font-family: 'Poppins', sans-serif; color: whitex; font-size: 20px; max-width: 40%; padding: 0 20px;">
    <h2 style="margin-bottom: 20px; font-weight: 700;">ADATA 1TB SSD Legend 960, NVMe PCIe Gen4 x 4 M.2</h2>
        <p>[Evolve Your Creativity] 1TB LEGEND 960 SSD supports M.2 2280 form factor with the 
            latest PCIe Gen 4.0 interface (backward compatible with PCIe 3.0) and NVMe protocol.
            [Massive Capacity] ADATA LEGEND 960 SSD provides up to 4TB capacity with 3D-stacked 
            flash memory, satisfying all daily needs with various protection and correction 
            technologies, compatible with PS5.</p>
    </div>
</div>

<div class="desc" style="text-align: center; color: white; padding: 10vh; font-size: 30px; max-width: 70%; margin: 0 auto;">
        <p>This SSD can support PS5 Storage system</p>
        <span style="font-weight: 700; color: #af47ff;">Rp1.375.000</span>
        <div class="button-container">
        <a href="https://www.tokopedia.com/aura-com/adata-legend-960-1tb-nvme-pcie-gen4x4-ssd-1tb" class="btn">Buy Now</a>
        </div>
        </div>


    <div class="desc" style="text-align: center; color: white; padding: 30vh; font-size: 30px; max-width: 80%; margin: 0 auto;">
    <span>Wow Chill You Scroll So Fast Wanna Go Up?</span>
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