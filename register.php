<?php


if(isset($_POST['userName'])){

$firstName = $_POST['firstName'];
$lastName = $_POST['secondName'];
$email = $_POST['email'];
$email = filter_var($email, FILTER_SANITIZE_EMAIL);

$user = $_POST['userName'];
$pass = md5($_POST['password']);

    
require 'templates/connectDB.php';

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        
    

    $sql = "INSERT INTO login (firstName, lastName, email, userName, password)
     VALUES ('$firstName','$lastName', '$email', '$user', '$pass')";
    $conn->query($sql);
    header('Location: index.php');
} else {
    echo("<h1 style='color:white'>$email is not a valid email address</h1>");
}
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="styles/style.css">
</head>
<body>
    <div class="box">
    <h1 class="login">Login</h1>
    <form method="POST" action="#">
        <input class="input" name="firstName" type="text" placeholder="Your firstName" require>

        <input class="input" name="secondName" type="text" placeholder="Your secondName" require>

        <input class="input" name="email" type="email" placeholder="Your email" require>

        <input class="input" name="userName" type="text" placeholder="Your name" require>

        <input class="input" name="password" type="password" placeholder="Password" require>

        <input type="submit" class='register' value="Register">
    </form>
</div>
</body>
</html>