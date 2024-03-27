<?php
@include 'config.php';

if(isset($_POST['submit'])){
   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = $_POST['password']; // Not hashed yet
   $cpass = $_POST['cpassword']; // Not hashed yet
   $user_type = $_POST['user_type'];

   // Check if the email already exists in the database
   $check_query = "SELECT * FROM user_form WHERE email = '$email'";
   $check_result = mysqli_query($conn, $check_query);

   if(mysqli_num_rows($check_result) > 0){
      $error[] = 'Email address is already registered.';
   } else {
      if($pass != $cpass){
         $error[] = 'Passwords do not match.';
      } else {
         // Hash the password before storing it in the database
         $hashed_password = md5($pass);

         // Insert new user into the database
         $insert_query = "INSERT INTO user_form(name, email, password, user_type) VALUES('$name','$email','$hashed_password','$user_type')";
         if(mysqli_query($conn, $insert_query)){
            header('location:login_form.php');
            exit;
         } else {
            $error[] = 'Error registering user. Please try again.';
         }
      }
   }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Register Form</title>
   <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
   <style>
      body {
         font-family: 'Poppins', sans-serif;
         background-color: #101820FF;
         background-size: cover;
         background-repeat: no-repeat;
      }

      .form-container {
   display: flex;
   justify-content: center;
   align-items: center;
   height: 90vh;
}

form {
   width: 350px;
   padding: 20px;
   background-color: #F2AA4CFF;
   border-radius: 10px;
   box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h3 {
   margin-bottom: 20px;
}

input[type="text"],
input[type="email"],
input[type="password"],
select {
   width: calc(100% - 20px); /* Subtract padding from width */
   padding: 5px 10px; /* Adjust padding */
   margin-bottom: 20px;
   border: none;
   border-bottom: 3px solid #ccc;
   outline: none;
   background-color: transparent;
   transition: border-bottom-color 0.3s;
}

input[type="text"]:focus,
input[type="email"]:focus,
input[type="password"]:focus,
select:focus {
   border-bottom-color: #E94B3CFF;
}

input[type="submit"] {
   width: 100%;
   padding: 10px;
   border: none;
   border-radius: 5px;
   background-color: #E94B3CFF;
   color: black;
   font-weight: bold;
   cursor: pointer;
   transition: background-color 0.3s;
}

input[type="submit"]:hover {
   background-color: orangered;
}

p {
   margin-top: 20px;
   text-align: center;
}

p a {
   color: black;
   transition: all 0.2s ease-in-out;
   font-weight: bold;
   text-decoration: none;
}

p a:hover {
    background-color: orangered;
    border-radius: 5px;
    padding: 8px;
}

.error-msg {
   color: red;
   font-size: 14px;
   margin-bottom: 10px;
}
   </style>

</head>
<body>
   
<div class="form-container">
   <form action="" method="post">
      <h3>Register Now</h3>
      <?php
      if(isset($error)){
         foreach($error as $error_msg){
            echo '<span class="error-msg">'.$error_msg.'</span>';
         }
      }
      ?>
      <input type="text" name="name" required placeholder="Enter your name">
      <input type="email" name="email" required placeholder="Enter your email">
      <input type="password" name="password" required placeholder="Enter your password">
      <input type="password" name="cpassword" required placeholder="Confirm your password">
      <select name="user_type">
         <option value="user">User</option>
         <option value="admin">Admin</option>
      </select>
      <input type="submit" name="submit" value="Register Now" class="form-btn">
      <p>Already have an account? <a href="login_form.php">Login Now</a></p>
   </form>
</div>

</body>
</html>
