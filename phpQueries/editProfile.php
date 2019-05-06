<?php 

  if(!isset($_SESSION)){
    session_start();
  }


    require '../templates/connectDB.php';


    $newName = $_POST['firstName'];
    $newLastName = $_POST['secondName'];
    $newEmail = $_POST['email'];
    $newUserName = $_POST['userName'];
    $newPassword = $_POST['password'];

    $whatUsername = $_SESSION['userName'];

    
    if(isset($_FILES['image']['name'])){
      
      $newImage = $_FILES['image']['name'];
      
      $target = "../uploads/".basename($newImage);
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


    


  	$sql = "UPDATE login 
            SET firstName = '$newName',
             lastName = '$newLastName',
             email = '$newEmail',
             userName = '$newUserName'
             WHERE userName = '$whatUsername'
              ";

    
  
  	$conn->query($sql);


?>