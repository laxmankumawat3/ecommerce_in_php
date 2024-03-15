<?php
include("../dbconnection.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Product view</title>
  <!-- Bootstrap CSS link -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <style>
    .fixed-size-container {
    width: 40px; /* Set your desired width */
    height: 40px; /* Set your desired height */
    border-radius: 50%;
}

  </style>
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

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">ProductImage</th>
      <th scope="col">ProductName</th>
      <th scope="col">ProductPriceInDoller</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
<?php 
   $showlist =  "SELECT * FROM `products`";
   $result = mysqli_query($con, $showlist);
   if(mysqli_num_rows($result) > 0){

       while ($row = mysqli_fetch_assoc($result)) {
    ?>
    <tr>
      <th scope="row"><?php echo $row["id"] ?></th>
      <td> <img class="fixed-size-container" src="<?php echo $row["image"] ?>" alt="image"></td>
      <td><?php echo $row["name"] ?></td>
      <td><?php echo $row["price"] ?></td>
      <td>
       <a href="editproduct.php?id=<?php echo $row['id']?>">
       <button class= "btn btn-primary mr-2 ">Edit </button>
    </a>
     <a href="productdelete.php?id=<?php echo $row['id']?>"> <button  class= "btn btn-danger">remove</button></a></td>
    </tr>
    <?php 

       }
   }
?>
  </tbody>
</table>
</div>

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
