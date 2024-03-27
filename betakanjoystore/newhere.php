<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Here</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="home.css">
    <style>

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-image: url('content/blackhole.gif'); /* Set the path to your GIF file */
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

        .content {
            text-align: center;
            position: relative;
            z-index: 1;
            overflow: hidden;
            border-radius: 15px; /* Rounded corners */
            padding-top: 30px;
            padding-bottom: 30px;
            padding: 20px;
        }

        .content::before {
            content: '';
            position: absolute;
            top: -70px;
            left: -50px;
            right: -50px;
            bottom: -50px;
            z-index: -1;
            background-color: rgba(204, 204, 255, 0.7); /* Transparent lavender background */
            transition: opacity 0.2s ease-in;
            opacity: 0; /* Initially transparent */
            border-radius: 30px; /* Rounded corners */
        }

        .content:hover::before {
            opacity: 1; /* Faded transition */
        }

        .logo {
            margin-bottom: 20px;
            transition: color 0.2s;
        }

        /* Styling for login, signup, and back buttons */
        .login-btn,
        .signup-btn,
        .back-btn {
            display: inline-block;
            padding: 10px 20px;
            margin: 10px;
            border: none;
            border-radius: 10px;
            background-color: transparent;
            color: #000; /* Pink text color */
            font-weight: bold; /* Bold font weight */
            text-decoration: none;
            transition: background-color 0.3s, color 0.3s;
        }

        .login-btn:hover,
        .signup-btn:hover,
        .back-btn:hover {
            background-color: rgba(255, 105, 180, 0.4); /* Transparent pink background on hover */
        }

        .content:hover .logo {
            color: #cc99ff; /* Transparent lavender color */
        }
    </style>
</head>
<body>
    <div class="content">
        <div class="logo">
            <img src="content/userlogo.png" alt="User Logo" width="380px">
        </div>
        <h1>Hi...Welcome!</h1>
        <h3>You don't have an account yet.</h3>
        <p>Would you like to</p>
        <div>
            <a class="login-btn" href="login_form.php">Login</a>
            <a class="signup-btn" href="register_form.php">Sign Up</a>
            <a class="back-btn" href="index.php">Go Back</a>
        </div>
    </div>
</body>
</html>
