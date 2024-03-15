<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    
</body>
</html>
<?php
include("dbaseconnection.php") ;
session_start();

if(isset($_GET['id']) && isset($_SESSION['user_id'])){
    $id = $_GET['id'];
    $user_id =   $_SESSION['user_id'];
    $indexToRemove = "DELETE FROM `cart` WHERE `user_id` ='$user_id' AND `id` = '$id'";
    $removeitem = mysqli_query($con, $indexToRemove);
    if($removeitem){
        echo
        "<script>
                     Swal.fire({
                         title: 'Product remove ',
                         text: 'from cart',
                         icon: 'success'
                     }).then(function() {
                         window.location.href = 'cart.php';
                     });
                   </script>";
    }else{
        echo "data not delete !!";
    }
  



}else{
    echo
    "<script>
                 Swal.fire({
                     title: 'Product id not found',
                     text: 'please check.',
                     icon: 'warning'
                 }).then(function() {
                     window.location.href = 'cart.php';
                 });
               </script>";
 
}
?>