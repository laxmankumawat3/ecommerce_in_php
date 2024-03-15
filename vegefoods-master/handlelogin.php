<?php
session_start();
include("dbaseconnection.php");
if (isset($_POST["email"])) {
    $email = $_POST["email"];

    $already = "SELECT * FROM `user` WHERE `email` = '$email'";
    $user = mysqli_query($con, $already);
    if (mysqli_num_rows($user) > 0) {
        $userdata = mysqli_fetch_array($user);
        $_SESSION['user'] = $userdata['name'];
        $_SESSION["user_id"] = $userdata['id'];
        $_SESSION["email"] = $email;
        echo 'user Login ';
    }
    // store user in session
} else {
    echo 'something went wrong';
}
?>
