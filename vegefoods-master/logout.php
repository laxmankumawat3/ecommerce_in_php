<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>addtocar</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <h1>welcome to logout</h1>
</body>
</html>

<?php
session_start();
 $email = $_SESSION["email"];

if(isset($_SESSION["email"])){
    session_destroy();  
    echo '<script>
            Swal.fire({
                title: "User logout ",
                text: "successfully",
                icon: "success"
            }).then(function() {
                window.location.href = "index.php"; // or wherever you want to redirect on error
            });
          </script>';
         
}else{
    echo '<script>
            Swal.fire({
                title: " Login ",
                text: "successfully",
                icon: "error"
            }).then(function() {
                window.location.href = "index.php"; // or wherever you want to redirect on error
            });
          </script>';
}
  
?>
