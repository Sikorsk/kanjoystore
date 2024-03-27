<?php
session_start();

@include 'config.php';

if(!isset($_SESSION['user_name'])) {
   header('location:login_form.php');
   exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>user page</title>
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
}

.content {
    text-align: center;
    color: white;
}

h3 {
   font-size: 45px;
}

h3 span {
    color: #101820FF;
    background-color: #F2AA4CFF;
    border-radius: 10px;
    padding: 2px 5px;
    background-size: cover;
    transition: all 0.3s ease-in-out;
}

h3 span:hover{
   background-color: orangered;
    color: black;
}

h1 {
    color: white;
    font-size: 55px;
}

h1 span {
    color: #F2AA4CFF;
}

p {
    color: white;
    font-size: 1.2em;
}

.btn {
    transition: all 0.3s ease;
    color: black;
    background-color: #F2AA4CFF;
    border-radius: 10px;
    display: inline-block;
    margin: 10px;
    padding: 10px 20px;
    text-decoration: none;
    font-weight: 600;
}

.btn:hover {
    background-color: orangered;
    color: black;
}


   </style>
</head>
<body>
   
<div class="container">

   <div class="content">
      <h3>hi, <span>user</span></h3>
      <h1>welcome <span><?php echo $_SESSION['user_name'] ?></span></h1>
      <p>this is an user page</p>
      <a href="index.php" class="btn">log Out</a>
      <a href="welcome.php" class="btn">Back To Home</a>
   </div>

</div>

</body>
</html>