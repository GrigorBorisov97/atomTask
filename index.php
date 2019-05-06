<?php
session_start();

if(isset($_SESSION['userName'])){
    unset($_SESSION['userName']);
}

if(isset($_POST['userName'])){

    $user = $_POST['userName'];
    $pass = md5($_POST['password']);

    require 'templates/connectDB.php';
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 



    $sql = "SELECT * FROM login
    WHERE userName = '$user' AND password = '$pass'";
    $result = $conn->query($sql);
    
    if ($result->num_rows === 1) {
        
        $_SESSION['userName'] = $user;
        header('Location: home.php');
    
}
    else{
        echo '<h1 style="color:white">Грешно потребителско име или парола</h1>';
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
        
        <input class="input" name="userName" type="text" placeholder="Your user name" require>

        <input class="input" name="password" type="password" placeholder="Password" require>

        <input type="submit" class='loginButton' value="Log in">
        
    </form>
        <a href='register.php'><button class='register'>Register</button></a>
</div>
</body>
</html>