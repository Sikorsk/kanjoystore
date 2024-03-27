<?php

@include 'config.php';

if(isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = md5($_POST['password']);

    $select = "SELECT * FROM user_form WHERE email = '$email' AND password = '$pass'";
    $result = mysqli_query($conn, $select);

    if(mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);
        $_SESSION['user_name'] = $row['name'];

        if($row['user_type'] == 'admin') {
            header('location:admin_page.php');
        } elseif($row['user_type'] == 'user') {
            header('location:user_page.php');
        }
        exit;
    } else {
        $error = 'Incorrect email or password!';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login Form</title>
   <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
   <style>
body {
   font-family: 'Poppins', sans-serif;
    background-color: #101820FF;
    background-size: cover;
    background-repeat: no-repeat;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
    overflow: hidden;
}

h3 {
    font-family: 'Poppins', sans-serif;
    color: #662184;
    font-weight: bold;
    font-size: 20px;
}

.form-container {
    text-align: center;
    max-width: 400px;
    width: 80%;
    padding: 20px;
    border-radius: 20px;
    background-color: #F2AA4CFF;
    overflow-y: auto; /* Add vertical scrollbar if needed */
}

.form-container form {
    text-align: center;
    max-width: 400px;
    width: 100%;
}

.form-container h3 {
    margin-bottom: 20px;
    color: #101820FF;
}

.form-container input[type="email"],
.form-container input[type="password"],
.form-container input[type="submit"] {
    margin: 15px 0;
    width: calc(100% - 20px);
    padding: 10px;
    border: none;
    border-radius: 0;
    box-sizing: border-box;
    font-size: 16px;
    background-color: transparent;
    border-bottom: 3px solid rgba(204, 204, 255, 0.7);
    outline: none;
    transition: border-bottom-color 0.3s;
}

.form-container input[type="email"]:focus,
.form-container input[type="password"]:focus {
    border-bottom-color: #E94B3CFF;
    color: #101820FF;
}

.form-container input[type="submit"] {
    background-color: #E94B3CFF;
    border-radius: 10px;
    color: black;
    cursor: pointer;
    transition: background-color 0.3s;
}

.form-container input[type="submit"]:hover {
    background-color: orangered;
}

.form-container p {
    margin-top: 15px;
    font-size: 14px;
    color: #333;
}

.form-container p a {
    color: black;
    transition: all 0.2s ease-in-out;
    text-decoration: none;
    font-weight: bold;
    text-shadow: #333;
}

.form-container p a:hover {
    background-color: orangered;
    border-radius: 5px;
    padding: 8px;
}

.error-msg {
    background-color: #E94B3CFF;
    padding: 10px;
    border-radius: 5px;
}

   </style>
</head>
<body>
   
<div class="form-container">

   <form action="welcome.php" method="post">
      <h3>Login Now</h3>
      <?php
      if(isset($error)){
         echo '<span class="error-msg">'.$error.'</span>';
      }
      ?>
      <input type="email" name="email" required placeholder="Enter your email">
      <input type="password" name="password" required placeholder="Enter your password">
      <input type="submit" name="submit" value="Login Now" class="form-btn">
      <p>Don't have an account? <a href="register_form.php">Register Now</a></p>
   </form>

</div>

</body>
</html>
