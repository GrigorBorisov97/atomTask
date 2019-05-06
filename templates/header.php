<?php
// Start the session
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 


    require 'connectDB.php';

    $userName = $_SESSION['userName'];

    $sql = "SELECT * FROM login WHERE userName = '$userName'";
    $result = $conn->query($sql);
    
    while($row = mysqli_fetch_array($result)){
        $img = $row['imagePath'];
    }

    if($img == ""){
        $path = "img/icon.png";
    }
    else{
        $path = "uploads/".$img;
    }

    if(!isset($_SESSION['userName'])){
        header('Location: index.php');
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>   
    <link rel="stylesheet" type="text/css" href="styles/style.css">
    
</head>
<body>
    <nav>
        <?php echo'<a href='.$leftButtonPath.' id="newBook">'.$leftButton.'</a>' ?>
        <div>
            <img id="coverImg" src="<?php echo $path; ?>" data-toggle="dropdown" class="waitresshead dropdown-toggle">

            <div class="dropdown-menu" style="display:none" onblur="hideDropdown()">

                <a class="dropdown-item" href="#!select" onclick="hideDropdown();"><?php echo $_SESSION['userName'] ?></a>
                <a class="dropdown-item" href="editProfile.php" onclick="hideDropdown();">Edit profile</a>
                <a class="dropdown-item" href="index.php" onclick="hideDropdown();">Logout</a>   
            
            </div>
        </div>
    </nav>
    <script>
        $('.dropdown-toggle').on("click", function() {
            $('.dropdown-menu').slideToggle(500);
            $('.waitresshead').toggleClass('selPic')
        });

        function hideDropdown(){
            $('.dropdown-menu').slideToggle(500);
            $('.waitresshead').toggleClass('selPic')
        }

        function deleteBook(bookX){
            $.post("phpQueries/deleteBook.php", {'id' : bookX},function(data, status){
                $('.toast').css("transform", "translateX(0)");
            });
            

            $("body").load("home.php");
        }


        $(document).ready(function(){
            <?php  if($_SERVER['PHP_SELF'] != "/taskForAtom/home.php"){
                echo '$(".toast").css("transform", "translateX(0)");';
             } ?>
            
            $("#closeToast").on("click", function(){
            $(".toast").css("transform", "translateX(100%)")});

        });

        
    </script>
    