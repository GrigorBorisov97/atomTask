<?php

require '../templates/connectDB.php';

    $id = $_POST['id'];


    $sql = "DELETE FROM `books` WHERE ID ='$id'";

    $conn->query($sql);

    
?>