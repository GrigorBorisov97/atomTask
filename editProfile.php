<?php 
session_start();
if(isset($_POST['submit'])){
  if(!isset($_SESSION)){
    session_start();
  }


    require 'templates/connectDB.php';


    $newName = $_POST['firstName'];
    $newLastName = $_POST['secondName'];
    $newEmail = $_POST['email'];
    $newUserName = $_POST['userName'];
    $newPassword = $_POST['password'];

    $whatUsername = $_SESSION['userName'];

    $newImage = $_FILES['image']['name'];
    
    if($newImage != ""){
      
      
      
      $target = "uploads/".basename($newImage);
      $imagePath = basename($newImage);

      if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        $msg = "Image uploaded successfully";
      }else{
        $msg = "Failed to upload image";
      }
    
    $sql = "UPDATE login
            SET imagePath = '$imagePath'
            WHERE userName = '$whatUsername'";

    $conn->query($sql);

    }

    $password = $_POST['password'];
    $pass = md5($password);

    if($password != ""){
        $sql = "UPDATE login
                SET password = '$pass'
                WHERE userName = '$whatUsername'";
        $conn->query($sql);
    }


    


  	$sql = "UPDATE login 
            SET firstName = '$newName',
             lastName = '$newLastName',
             email = '$newEmail',
             userName = '$newUserName'
             WHERE userName = '$whatUsername'
              ";

    
  
  	$conn->query($sql);
};


?>

<?php


$leftButton = 'View Books';
$leftButtonPath = 'home.php';


$userName = $_SESSION['userName'];

require 'templates/header.php'; ?>

<?php

    require 'templates/connectDB.php';
    
    $sql = "SELECT * FROM login WHERE userName = '$userName'";
    $row = [];
    
    $result = $conn->query($sql);
    
    while($row = mysqli_fetch_array($result)){
      echo '
      
      <form method="POST" action="#" enctype="multipart/form-data">
      
            <input class="input" name="firstName" value='.$row['firstName'].' type="text" placeholder="Your firstName" require>

            <input class="input" name="secondName" value='.$row['lastName'].' type="text" placeholder="Your secondName" require>
            
            <input class="input" name="email" value='.$row['email'].' type="email" placeholder="Your email" require>

            <input class="input" name="userName" value='.$row['userName'].' type="text" placeholder="Your name" require>
            
            <input class="input" id="passInput" onkeyup="passValidate()" name="password" type="password" placeholder="Password" require>

            <input class="input" id="secondPassInput" onkeyup="passValidate()" name="password" type="password" placeholder="Retype Password" require>

            <h1 style="font-size:20px">Change profile picture</h1>
            
            <input type="file" name="image">

            <input type="submit" class="loginButton" name="submit" value="Edit">
            </form>
            ';
    }


    if(isset($_POST['submit'])){
      echo '
          <div class="toast" data-autohide="false">
          <div class="toast-header">
            <strong class="mr-auto text-primary">Edited</strong>
            <small class="text-muted">5 mins ago</small>
            <button id="closeToast" type="button" class="ml-2 mb-1 close" data-dismiss="toast">&times;</button>
          </div>
          <div class="toast-body">
            Your profile has been edited
          </div>
        </div>
        </div>
    
       ';
    }
    
    ?>

    <script>
      function passValidate(){
        var pass = $("#passInput").val();
        var secondPass = $("#secondPassInput").val();
 
          if(pass != secondPass || (pass.length < 6 && pass.length != 0)){
            $(".loginButton").addClass("loginDisabled").attr({"title" : "The two passwords doesn't match or password length has less than 6 character", "disabled" : "disabled"});

        }          

          else{
            $(".loginButton").removeClass("loginDisabled").attr("title" , "").prop('disabled', false);
          }
        
      }

 


    </script>