<?php
include("../dbconnection.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Product Add Form</title>
  <!-- Bootstrap CSS link -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
<div style="display : flex">
      <?php
    include("../sidebar.php");
    ?> 
<div style = "width : 100%">


  <?php
 include("../topbar.php");
  ?>

<div class="container mt-5">
  <h2 class="mb-4">Product Add Form</h2>
  
  <form method = "post"  enctype="multipart/form-data" >
    <!-- Product Image Input -->
    <div class="form-group">
      <label for="productImage">Product Image</label>
      <input required type="file" name = "file"  class="form-control-file" id="productImage" accept="image/*">
    </div>

    <!-- Product Name Input -->
    <div class="form-group">
      <label for="productName">Product Name</label>
      <input required type="text" name="productName" class="form-control" id="productName" placeholder="Enter product name">
    </div>

    <!-- Product Price Input -->
    <div class="form-group">
      <label for="productPrice">Product Price</label>
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text">$</span>
        </div>
        <input required type="number" name="productPrice" class="form-control" id="productPrice" placeholder="Enter product price">
      </div>
    </div>

    <!-- Submit Button -->
    <button type="submit" class="btn btn-primary">Add Product</button>
  </form>
</div>
</div>

<!-- Bootstrap JS and Popper.js scripts (order matters) -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</div>
</body>
</html>

<?php
include("../footer.php");



// let upload product in data base 
if($_SERVER["REQUEST_METHOD"] == "POST"){
  // COLLECT DATA FROM INPUT FILED 
  $image = $_FILES["file"];
  $dirname = "images/";
  $target_file = $dirname . basename($_FILES["file"]["name"]);
  $productName = $_POST["productName"];
  $ProdutPrice = $_POST["productPrice"];

  // print_r($image);
  if(file_exists($target_file)) {
    echo "<br>";
    echo "Sorry, file already exists.";
  }
  else if(move_uploaded_file($image["tmp_name"], $target_file)){

  
    echo "file upload successfully". $target_file ."";
    $insertProducts = "INSERT INTO `products`(`image`,`name`,`price`) VALUE ('$target_file','$productName','$ProdutPrice')";
    $result = mysqli_query($con, $insertProducts); 
    if($result){
      echo '<script>
         Swal.fire({
        title: "Product add successfully",
        text: "You clicked the button!",
        icon: "success"
      });
      </script>';
    }else{
      echo '<script>
      Swal.fire({
     title: "Product add successfully",
     text: "You clicked the button!",
     icon: "error"
   });
   </script>';
    }

  };
}
?>
