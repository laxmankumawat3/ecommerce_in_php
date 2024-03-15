<?php
include("dbaseconnection.php"); // Include your database connection file


if (isset($_POST["name"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $mobileNo = $_POST["mobileNo"];

    echo'above code';

    $alreadyExistQuery = "SELECT * FROM `user` WHERE `email` = '$email'";
    echo"afterquery";
    $userResult = mysqli_query($con, $alreadyExistQuery);
    echo"afterquery1";

    if (mysqli_num_rows($userResult) > 0) {
        echo "user already exists, please use another email";
    } else {
        $insertDataQuery = "INSERT INTO `user`(`name`, `email`, `phoneno`) VALUES ('$name','$email','$mobileNo')";
        $sqlResult = mysqli_query($con, $insertDataQuery);

        if ($sqlResult) {
            echo 'data inserted successfully';
        } else {
            echo 'something went wrong';
        }
    }
}
else{
    echo "off" ;
}
?>
