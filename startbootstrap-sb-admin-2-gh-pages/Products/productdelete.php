<?php 
include("../dbconnection.php");
$id = $_GET["id"];
$getdata = "SELECT * FROM `products` WHERE `id` = '$id'";
$productdata = mysqli_query($con, $getdata);
$productdata1 = mysqli_fetch_array($productdata);
print_r($productdata1);
$imagepath = $productdata1["image"];
if(file_exists($imagepath)){
    if(unlink($imagepath)){
        echo "file unlink successfully";
    }else{
        echo "file not unlink successfully";
    }
}else{
    echo "file not exist";
}
$sql = "DELETE FROM `products` WHERE `id` = '$id'";
if(mysqli_query($con, $sql)){
    echo "<script> alert('data delete successfully); </script>";
   header("Location:viewporduct.php");
}
?>