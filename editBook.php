<?php 
session_start();


if(isset($_POST['book'])){
    $bookId = $_POST['book'];
}else{
    $bookId = $_POST['bookID'];
}


if(isset($_POST['submit'])){
  if(!isset($_SESSION)){
    session_start();
  }

  


    require 'templates/connectDB.php';


    $editName = $_POST['Name'];
    $ISBN = $_POST['ISBN'];
    $Year = $_POST['Year'];
    $Description = $_POST['Description'];

    $newImage = $_FILES['newBookImg']['name'];

    if($newImage != ""){
      
      
      
        $target = "uploads/".basename($newImage);
        $imagePath = basename($newImage);
  
        if (move_uploaded_file($_FILES['newBookImg']['tmp_name'], $target)) {
          $msg = "Image uploaded successfully";
        }else{
          $msg = "Failed to upload image";
        }
      
      $sql = "UPDATE `books` 
              SET `image` = '$imagePath' 
              WHERE `books`.`ID` = '$bookId'";
  
      $conn->query($sql);
  
      }

  	$sql = "UPDATE books 
            SET Name = '$editName',
             ISBN = '$ISBN',
             Year = '$Year',
             Description = '$Description'
             WHERE ID = '$bookId'
              ";

    
  
  	$conn->query($sql);
};


?>

<?php


$leftButton = 'View Books';
$leftButtonPath = 'home.php';



require 'templates/header.php'; ?>

<?php

    require 'templates/connectDB.php';
    
    $sql = "SELECT * FROM books WHERE ID = '$bookId'";
    $row = [];
    
    $result = $conn->query($sql);
    
    while($row = mysqli_fetch_array($result)){
      echo '
      
      <form method="POST" id="form" action="#" enctype="multipart/form-data">
            <input type="hidden" value='.$row["ID"].' name="bookID">
            <div class="leftEdit">
                <img src="uploads/'.$row['image'].'" />
                <div class="changeImg">
                <img src="img/shuffle.png" class="shuffle"></div>
                
                <img src="img/shuffle.png" class="shuffle">
                <input type="file" name="newBookImg" id="fileUpload" style="display: none" />
            </div>

            <div class="rightEdit">
                <input class="input" name="Name" value="'.$row['Name'].'" type="text" placeholder="Your firstName" require>

                <input class="input" name="ISBN" value="'.$row['ISBN'].'" type="text" placeholder="Your secondName" require>
                
                <input class="input" name="Year" value="'.$row['Year'].'" type="number" value="2019" min="1960" max="2050" placeholder="Your email" require>

                <textarea class="input" name="Description" value="" type="text" rows=7 require>'.$row['Description'].'</textarea>

                <input id="submitButton" type="submit" class="loginButton" name="submit" value="Edit">
            </div>
            </form>
            <style>
                .input{
                    width:500px;
                }
                .input:focus{
                    width:550px;
                }
            </style>
            <script>
                $(".changeImg, .shuffle").on("mouseenter", function(){
                    $(".shuffle").addClass("shuffleHovered");
                    $(".changeImg").addClass("changeImgHovered");
                    
                })

                $(".changeImg, .shuffle").on("mouseleave", function(){
                    $(".shuffle").removeClass("shuffleHovered");
                    $(".changeImg").removeClass("changeImgHovered");
                    
                })

                $(".changeImg, .shuffle").on("click", function(){
                
                    $("#fileUpload").click();
                });

                $("#fileUpload").on("change", function(){
                    $("#submitButton").click();
                })

            </script>
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
            Your book has been edited
          </div>
        </div>
        </div>
    
       ';
    }
    
    ?>
    <script>
          $("#closeToast").on("click", function(){
            $(".toast").css("transform", "translateX(100%)")
            });
        

    </script>
