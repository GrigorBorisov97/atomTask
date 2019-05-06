<?php

  $leftButton = 'View Books';
  $leftButtonPath = 'home.php';


  require 'templates/connectDB.php';

  // Initialize message variable
  $msg = "";

  // If upload button is clicked ...
  if (isset($_POST['upload'])) {
    
    $name = $_POST['bookName'];
    $isbn = $_POST['ISBN'];
    $year = $_POST['year'];
    $description = $_POST['description'];
    $image = $_FILES['image']['name'];
  	// Get text

  	// image file directory
  	$target = "uploads/".basename($image);

  	$sql = "INSERT INTO books (Name, ISBN, Year, Description, image) 
      VALUES ('$name', '$isbn', '$year', '$description', '$image')";
  	// execute query
  	$conn->query($sql);

  	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		$msg = "Image uploaded successfully";
  	}else{
  		$msg = "Failed to upload image";
  	}
  }
  $result = mysqli_query($conn, "SELECT * FROM books");
?>

<?php require 'templates/header.php'; 


if(isset($_POST['upload'])){
  echo '
      <div class="toast" data-autohide="false">
      <div class="toast-header">
        <strong class="mr-auto text-primary">Added</strong>
        <small class="text-muted">5 mins ago</small>
        <button id="closeToast" type="button" class="ml-2 mb-1 close" data-dismiss="toast">&times;</button>
      </div>
      <div class="toast-body">
        The book has added to the database
      </div>
    </div>
    </div>

    <script>
    $("#closeToast").on("click", function(){
      $(".toast").css("transform", "translateX(100%)")});
    </script>

   ';
}
?>

<form method="POST" action="newBook.php" enctype="multipart/form-data">

      <input type="hidden" name="size" value="1000000">

      <h1>add new book</h1>
      
  	<div>

        <input class="input" placeholder='Enter Book Name' type="text" name='bookName'>

        <input id="isbnValue" onkeypress="isbnConverter()" class="input" placeholder='Enter ISBN' type="text" name="ISBN">

        <textarea class="input" placeholder='Type description' type="text" name="description" rows="5"></textarea>

        <input class="input" placeholder='Enter year' type="number" min="1900" max="2099" step="1" value="2019" name='year'>

        <input placeholder='' type="file" name="image">
        
  	</div>
  	<div>
  		<button type="submit" name="upload" class='loginButton'>Add</button>
  	</div>
  </form>
</div>

<script>

function isbnConverter(){
        var value = $("#isbnValue").val();

        if(value.length == 3 || value.length == 5 || value.length == 8 || value.length == 15){
            $("#isbnValue").val(value + '-')
        }
        else if(value.length >= 17){
            $("#isbnValue").val(value.slice(0,16))
        }
        
    }
</script>
</body>
</html>