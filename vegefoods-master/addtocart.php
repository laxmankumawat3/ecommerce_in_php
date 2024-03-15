<?php 
include("dbaseconnection.php");
?>
<?php
session_start();
if (!empty($_POST['product_id']) && isset($_SESSION["user_id"])) {

    $user_id =  $_SESSION["user_id"];
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];

    $sql = "SELECT * FROM `cart` WHERE `user_id` = '$user_id' AND `name` = '$product_name'";
    $result = mysqli_query($con, $sql);
   if(mysqli_num_rows($result) > 0) {
    echo "product already in the cart";
   }else{
    $addproduct = mysqli_query($con,"INSERT INTO `cart` (`user_id`,`name`,`image`,`price`)VALUE ('$user_id','$product_name','$product_image','$product_price')");
    if($addproduct)
    echo "product add database successfully";   
   } 
}
else {
    echo "Product id not recived or user_id not recevied";
    header("index.php");
}
?>
