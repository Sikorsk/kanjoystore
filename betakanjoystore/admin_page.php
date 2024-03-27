<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['admin_name'])){
   header('location:login_form.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>admin page</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<h1 style="text-align: center; max-width: 600px; margin: 0 auto;">when you think being admin as easy as changing the user to admin</h1>

<div class="container">
<div class="content">
    <img src="content/admin.jpg" alt="" style="display: block; margin: 0 auto; width: 70vh; max-width: 100%; height: auto; margin-top: -20px;">
    <a href="logout.php" class="btn" style="display: block; margin: 20px auto; width: 150px; text-align: center;">Logout</a>
</div>


</div>

</body>
</html>