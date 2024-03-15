<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
include("../dbconnection.php");
 $id = $_GET['id'];
 $find = "SELECT * FROM `products` WHERE `id` = '$id'";
 $result = mysqli_query($con, $find);
 $row = mysqli_fetch_array($result);

 if($_SERVER['REQUEST_METHOD'] == 'POST'){

   $findimage ;
   if($_FILES["file"]["error"] == 0){
    $findimage  = "images/". basename($_FILES["file"]["name"]);
    $productName = $_POST["productName"];
    $productPrice = $_POST["productPrice"];
   
    $dirname = "images/". basename($_FILES["file"]["name"]);
 
     if(!file_exists($findimage)){
       move_uploaded_file($_FILES["file"]["tmp_name"], $findimage);
     }
        
        $update = "UPDATE `products` SET  `image`='$findimage',`name`='$productName',`price`='$productPrice' WHERE `id` = '$id'";
        $result = mysqli_query($con, $update);
        if($result){
          echo '<script>
          Swal.fire({
          title: "Product Edit success with image",
          text: "You clicked the button!",
          icon: "success"
          });
       </script>';
          header('Location:viewporduct.php');
     }else{
      echo '<script>
      Swal.fire({
     title: "data not insert database",
     text: "You clicked the button!",
     icon: "error"
   });
   </script>';
     }

   }else{
   
    $productName = $_POST["productName"];
    $productPrice = $_POST["productPrice"];
        
        $update = "UPDATE `products` SET `name`='$productName',`price`='$productPrice' WHERE `id` = '$id'";
        $result = mysqli_query($con, $update);
        if ($result) {
          echo '<script>
              Swal.fire({
                  title: "Product Edit successfully",
                  text: "You clicked the button!",
                  icon: "success"
              });
          </script>';
          header('Location:viewporduct.php');
      }
      
      else{
      echo '<script>
      Swal.fire({
     title: "Product not Edit successfully",
     text: "You clicked the button!",
     icon: "error"
   });
   </script>';
     }
   }
}else{
echo"code not working correctly";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Product</title>
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
  <h2 class="mb-4">Product Edit </h2>
  
  <form method = "post"  enctype="multipart/form-data" >
    <!-- Product Image Input -->
    <div class="form-group">
      <label for="productImage">Product Image</label>
      <img src="<?php echo $row['image']; ?>" alt="Current Image" style="width : 50px ;heigth:50px borderRadius: 50%;">
      <input  type="file" name="file"   class="form-control-file" id="productImage" accept="image/*">
    </div>

    <!-- Product Name Input -->
    <div class="form-group">
      <label for="productName">Product Name</label>
      <input  type="text" name="productName" value="<?php echo $row['name']?>" class="form-control" id="productName" placeholder="Enter product name">
    </div>

    <!-- Product Price Input -->
    <div class="form-group">
      <label for="productPrice">Product Price</label>
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text">$</span>
        </div>
        <input  type="number" name="productPrice" value="<?php echo $row['price']?>" class="form-control" id="productPrice" placeholder="Enter product price">
      </div>
    </div>

    <!-- Submit Button -->
    <button type="submit" class="btn btn-primary">Edit Product</button>
  </form>
</div>
</div>

<!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->


<!-- Bootstrap JS and Popper.js scripts (order matters) -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</div>
</body>
</html>

<?php
include("../footer.php");
?>
