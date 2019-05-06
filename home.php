<?php
$leftButton = 'Create book';
$leftButtonPath = 'newBook.php';

require 'templates/header.php'; ?>

<?php

    require 'templates/connectDB.php';

    $sql = "SELECT * FROM books";
    $row = [];

    $result = $conn->query($sql);

    

    while($row = mysqli_fetch_array($result)){
        echo '<div class="bookHolder">

                <img class="bookImage" src="uploads/'.$row['image'].'">

                <h1 onclick="editBook('.$row['ID'].')" class="nameBook">'.$row['Name'].'</h1>

                <h2 class="isbnBook">'.$row['ISBN'].'</h2>

                <p class="descriptionBook">'.$row['Description'].'</p>

                <span class="yearBook">Year : '.$row['Year'].'</span>

                <div class="editButtons">
                    <img onclick="editBook('.$row['ID'].')" src="img/edit.png" >
                    <img onclick="deleteBook('.$row['ID'].')" src="img/x-button.png" >
                </div>

            </div>';
        
    }

    ?>

        <div class="toast" data-autohide="false">
            <div class="toast-header">
                <strong class="mr-auto text-primary">Edited</strong>
                <small class="text-muted">0 mins ago</small>
                <button id="closeToast" type="button" class="ml-2 mb-1 close" data-dismiss="toast">&times;</button>
            </div>
            <div class="toast-body">
                Your book has been deleted
            </div>
        </div>

    <script>
        function editBook(thisBook){
            var form = document.createElement("form");
            form.setAttribute("method", "post");
            form.setAttribute("action", "editBook.php");

            var hiddenField = document.createElement("input");      
            hiddenField.setAttribute("name", "book");
            hiddenField.setAttribute("value", thisBook);
            form.appendChild(hiddenField);
            document.body.appendChild(form);    // Not entirely sure if this is necessary           
            form.submit();
        }



    </script>
